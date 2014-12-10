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
		$crawler = $crawler->filterXPath('//table')->eq(2);
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

		foreach($table as $t) {
			if ($count-- <= 1) {
				break;
			}
			else {
				echo $t[2] . " " . strtotime($t[3]) . " (" . $t[3] . ")<br/>";
			}
		}

		$data['name'] = "Home";
		return View::make('home', compact('data'));
	}
}