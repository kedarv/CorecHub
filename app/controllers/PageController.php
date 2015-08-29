<?php
use Goutte\Client;

ini_set('xdebug.var_display_max_depth', 200);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 20000);

class PageController extends BaseController {

	/**
	* Finds a string between two strings
	*
	* @param String to conduct the search in
	* @param First part of the string to look for (start)
	* @param Second part of the string to look for (end)
	* @return String between the start and end params
	*/
	function get_string_between($string, $start, $end){
		$string = " ".$string;
		$ini = strpos($string,$start);
		if ($ini == 0) return "";
		$ini += strlen($start);
		$len = strpos($string,$end,$ini) - $ini;
		return substr($string,$ini,$len);
	}

	/**
	* Scrapes the CoRec website for data
	* @return Array of check-in data
	*/
	function scrapePage() {
		// Initalize Client, set options
		$client = new Client();
		$client->getClient()->setDefaultOption('verify', false);
		// Request login page
		$crawler = $client->request('GET', 'https://wpvappwt01.itap.purdue.edu/wbwsc/webtrac.wsc/wbsplash.html');

		// Select form, input values
		$form = $crawler->filterXPath('//*[@id="sp_login"]/form')->form(array(
			'xxlogid' => Crypt::decrypt(Auth::user()->puid),
			'xxlogpin' => Auth::user()->email,
			));

		// Submit form, find redirect, and then visit the redirect link
		$submit = $client->submit($form);
		$getLoggedInHTML = $submit->filterXpath('//*[@id="content"]')->children()->html();

		// This implementation is too fragile because tabbing breaks it.
		//$parsedLink = $this->get_string_between($getLoggedInHTML, "<!--location.replace('", "');//-->");

		// This implementation is more robust
		preg_match('~\'(.*?)\'~', $getLoggedInHTML, $match);

		// Look for the history link, then click on the link
		$crawler = $client->request('GET', $match[1]);
		$link = $crawler->selectLink('My History')->link();
		$crawler = $client->click($link);

		// Generate Time
		$timeEnd = date("m/d/Y", time()); // Today's Date

		if(Auth::user()->firstrun == 0) {
			$timeStart = date("m/d/Y", strtotime($timeEnd . '-1 year')); // One year ago from today
		}
		else {
			$timeStart = date("m/d/Y", Auth::user()->lastrun);
		}

		// Find the history form, input values
		$form = $crawler->filterXPath('//*[@id="hhhistory"]')->form(array(
			'xxpassbeg' => $timeStart,
			'xxpassend' => $timeEnd,
		));
		$submit = $client->submit($form);

		// Find history table, grab the the last table in the page
		$crawler = $submit->filterXPath('//table')->last();
		$table = "<table>" . $crawler->html() . "</table>";

		// Initalize DomDocument, set config options
		$dom = new DomDocument;
		$dom->loadHTML($table);
		$dom->preserveWhiteSpace = false;
		
		// Select table
		$tables = $dom->getElementsByTagName('table');
		
		// Select ALL tr tags
		$rows = $tables->item(0)->getElementsByTagName('tr');

		$table = array();
		
		// Go through tr, select all the td within the tr and store it in an array
		foreach ($rows as $row) {   
			$cols = $row->getElementsByTagName('td');   
			$row = array();
			foreach ($cols as $node) {
				$row[] = $node->nodeValue;
			}
			    $table[] = $row; // not sure why this is here, probably can remove it later
			}

			// Remove the first item (just has header information which isn't needed)
			unset($table[0]);

			return $table;
		}

	function processData($eloquentTable) {

		// Go through each td block
		foreach($eloquentTable as $t) {
			// Store in punchcard array.
			$dataPunch[$t['day']] = $t['time'];

			// Store heatmap values
			// Add 86400 seconds (1 day) to fix offset
			if(isset($dataHeat[$t['day']+86400])) { // Check if the value exists, if it has increment
				$dataHeat[$t['day']+86400]++;
			}
			else { // If the value does not increment, set it to 1
				$dataHeat[$t['day']+86400] = 1;
			}
		}
			
		// This foreach loop converts unix timestamps of the day to a number from 1 to 7
		// which represents the numbered day of the week
		$week = array();
		foreach($dataPunch as $k => $v) {
			switch(date("N", $k)) {
				case 1:
				$week[1][] = $v;
				break;

				case 2:
				$week[2][] = $v;
				break;

				case 3:
				$week[3][] = $v;		
				break;

				case 4:
				$week[4][] = $v;	
				break;

				case 5:
				$week[5][] = $v;
				break;

				case 6:
				$week[6][] = $v;	
				break;

				case 7:
				$week[7][] = $v;
				break;
			}
		}

		// Initalize 7 arrays with 24 slots, one for each hour (initalized to 0 <- not sure if this necessary)
		$monday = array_fill(0, 24, 0);
		$tuesday = array_fill(0, 24, 0);
		$wednesday = array_fill(0, 24, 0);
		$thursday = array_fill(0, 24, 0);
		$friday = array_fill(0, 24, 0);
		$saturday = array_fill(0, 24, 0);
		$sunday = array_fill(0, 24, 0);

		$i = 1;

		// Sort the array 1 to 7, just in case
		ksort($week);

		// Messy code that fills in the array for each day. This should be consolidated in the future.
		foreach($week as $day) {
			foreach($day as $occurance) {
				switch($i) {
					case 1:
					if(isset($monday[date('G', $occurance)])) {
						$monday[date('G', $occurance)]++;
					}
					else {
						$monday[date('G', $occurance)] = 1;
					}
					break;

					case 2:
					if(isset($tuesday[date('G', $occurance)])) {
						$tuesday[date('G', $occurance)]++;
					}
					else {
						$tuesday[date('G', $occurance)] = 1;
					}
					break;

					case 3:
					if(isset($wednesday[date('G', $occurance)])) {
						$wednesday[date('G', $occurance)]++;
					}
					else {
						$wednesday[date('G', $occurance)] = 1;
					}
					break;

					case 4:
					if(isset($thursday[date('G', $occurance)])) {
						$thursday[date('G', $occurance)]++;
					}
					else {
						$thursday[date('G', $occurance)] = 1;
					}
					break;

					case 5:
					if(isset($friday[date('G', $occurance)])) {
						$friday[date('G', $occurance)]++;
					}
					else {
						$friday[date('G', $occurance)] = 1;
					}
					break;

					case 6:
					if(isset($saturday[date('G', $occurance)])) {
						$saturday[date('G', $occurance)]++;
					}
					else {
						$saturday[date('G', $occurance)] = 1;
					}
					break;

					case 7:
					if(isset($sunday[date('G', $occurance)])) {
						$sunday[date('G', $occurance)]++;
					}
					else {
						$sunday[date('G', $occurance)] = 1;
					}
					break;
				}
			}
			$i++;
		}

		// Put everything in the dataJSON variable
		$dataJSON['heat'] = json_encode($dataHeat);

		$dataJSON['monday'] = json_encode($monday);
		$dataJSON['tuesday'] = json_encode($tuesday);
		$dataJSON['wednesday'] = json_encode($wednesday);
		$dataJSON['thursday'] = json_encode($thursday);
		$dataJSON['friday'] = json_encode($friday);
		$dataJSON['saturday'] = json_encode($saturday);
		$dataJSON['sunday'] = json_encode($sunday);
		return $dataJSON;
	}

	function storeData($table) {
		$count = count($table);

		// Go through each td block
		foreach($table as $t) {
			if ($count-- <= 1) {
				break;
			}
			else {
				// t[2] is the day and t[3] is the time of checkin
				// Replace 'A' with 'am' and 'P' with 'pm' so that strtotime can recognize the format
				$time = str_replace("A", "am",  $t[3]);
				$time = str_replace("P", "pm",  $t[3]);

				$checkin = new Checkin;
				$checkin->day = strtotime($t[2]);
				$checkin->time = strtotime($time);
				$checkin->userid = Auth::user()->id;
				$checkin->save();
			}
		}
	}

	function run() {
		// Check if the user is running the app for the first time
		// Or if the cooldown period (24 hours) has been reached
		if(Auth::user()->firstrun == 0 || Session::has('rerun'))  {
			$table = $this->scrapePage();
			$this->storeData($table);

			$user = User::find(Auth::user()->id);
			if(Auth::user()->firstrun == 0) {
				$user->firstrun = 1;
			}
			$user->lastrun = time();
			$user->touch();
			$user->save();
			Session::forget('rerun');
			Log::error("destroy");
		}
		elseif((time() - Auth::user()->lastrun) > 86400) {
			Session::put('rerun', 'true');
			Log::error("ok");
		}
		$checkin = Checkin::where('userid', '=', Auth::user()->id)->get(array("day", "time"))->toArray();
		return $this->processData($checkin);
	}
	public function home() {
		$data['name'] = "Home";
		return View::make('home', compact('data'));
	}
	public function renderStats() {
		try {
			$dataJSON = $this->run();
		} catch (InvalidArgumentException $e) {
			//return Redirect::action('UsersController@manage')->with('message', 'Could not authenticate with Purdue. Please make sure your PUID and email are correct.');
			return "<script>window.location.href ='" . URL::action('UsersController@manageBadInfo') . "';</script>";
		}
		return View::make('renders', compact('dataJSON'));
	}
	public function showStats() {
		$data['name'] = "Stats";
		return View::make('stats', compact('data'));
	}
}