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

		public function showWelcome() {
			if (Cache::has('json')) {
				$dataJSON = Cache::get('json');
			}
			else {
				$client = new Client();
				$client->getClient()->setDefaultOption('verify', false);
				$crawler = $client->request('GET', 'https://wpvappwt01.itap.purdue.edu/wbwsc/webtrac.wsc/wbsplash.html');
				$form = $crawler->filterXPath('//*[@id="sp_login"]/form')->form(array(
					'xxlogid' => Config::get('keys.id'),
					'xxlogpin' => Config::get('keys.email'),
				));
				$submit = $client->submit($form);
				$getLoggedInHTML = $submit->filterXpath('//*[@id="content"]')->children()->html();
				$parsedLink = $this->get_string_between($getLoggedInHTML, "<!--
location.replace('", "');
//-->");
				$crawler = $client->request('GET', $parsedLink);
				$link = $crawler->selectLink('My History')->link();
				$crawler = $client->click($link);

				$form = $crawler->filterXPath('//*[@id="hhhistory"]')->form(array(
					'xxpassbeg' => '11/01/2013',
					'xxpassend' => '12/10/2014',
				));
				$submit = $client->submit($form);

				$crawler = $submit->filterXPath('//table')->eq(2);
				$table = "<table>" . $crawler->html() . "</table>";
				//var_dump($table);

				$dom = new DomDocument;
				$dom->loadHTML($table);
				$dom->preserveWhiteSpace = false;
				$tables = $dom->getElementsByTagName('table');
				$rows = $tables->item(0)->getElementsByTagName('tr');

				$table = array();
				foreach ($rows as $row) {   
				    $cols = $row->getElementsByTagName('td');   
				    $row = array();
				    foreach ($cols as $node) {
				   		$row[] = $node->nodeValue;
				    }
				    $table[] = $row;
				}

				unset($table[0]);
				$count = count($table);

				$dataHeat = array();
				$dataPunch = array();

				foreach($table as $t) {
					if ($count-- <= 1) {
						break;
					}
					else {
						$time = str_replace("A", "am",  $t[3]);
						$time = str_replace("P", "pm",  $t[3]);
						$dataPunch[strtotime($t[2])] = strtotime($time);
						if(isset($dataHeat[strtotime($t[2])])) {
							$dataHeat[strtotime($t[2])]++;
						}
						else {
							$dataHeat[strtotime($t[2])] = 1;
						}
						//echo strtotime($t[2]) . " " . strtotime($t[3]) . " (" . $t[3] . ")<br/>";
					}
				}
				
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
					//echo date("N", $k) . " - " . 	$v . "<br/>";
				}

				$monday = array_fill(0, 24, 0);
				$tuesday = array_fill(0, 24, 0);
				$wednesday = array_fill(0, 24, 0);
				$thursday = array_fill(0, 24, 0);
				$friday = array_fill(0, 24, 0);
				$saturday = array_fill(0, 24, 0);
				$sunday = array_fill(0, 24, 0);

				//var_dump($sunday);
				$i = 1;
				ksort($week);
				var_dump($week);
				foreach($week as $day) {
					foreach($day as $occurance) {
						echo date('G', $occurance) ." ~ ";
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

				$dataJSON['heat'] = json_encode($dataHeat);
				$dataJSON['punch'] = json_encode($dataPunch);
				$dataJSON['monday'] = json_encode($monday);
				$dataJSON['tuesday'] = json_encode($tuesday);
				$dataJSON['wednesday'] = json_encode($wednesday);
				$dataJSON['thursday'] = json_encode($thursday);
				$dataJSON['friday'] = json_encode($friday);
				$dataJSON['saturday'] = json_encode($saturday);
				$dataJSON['sunday'] = json_encode($sunday);

				$expiresAt = Carbon::now()->addMinutes(1440);
				Cache::add('json', $dataJSON, $expiresAt);
			}
		var_dump($dataJSON['monday']);
		$data['name'] = "Home";
		return View::make('home', compact('data', 'dataJSON'));
	}
}