<?php
//if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') && ($_SERVER['HTTP_ORIGIN'] == 'https://technicalseo.com')) {
	header("Cache-Control: must-revalidate, max-age=0");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	header('Content-Type: application/json');
	set_time_limit(0);
	ini_set('max_execution_time', 0);
	//testing url
	$url = "https://www.technicalseo.com/";
	//$url = $_POST['url'];
  if ($url && stripos($url, 'http://') !== 0 && stripos($url, 'https://') !== 0) {$url = 'http://' . $url;}

	$api_key = '3fd2c0cd-53d5-444f-bbaa-ebf1eb82f5c4';
	$api_url = 'https://validator-api.semweb.yandex.ru/v1.1/url_parser';
	$curl_url = $api_url.'?apikey='. $api_key. '&url='.$url.'&lang=en&pretty=true&only_errors=false';
	echo file_get_contents($curl_url);


	/*$api_url = 'https://searchconsole.googleapis.com/v1/urlTestingTools/mobileFriendlyTest:run?key='.$api_key[$r];
	$request_headers = array("content-type: application/json");
	$data = '{url: "'.$url.'", requestScreenshot: "true"}';
	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,            $api_url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, 	 $request_headers);
		curl_setopt($ch, CURLOPT_POSTFIELDS, 	 $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
	curl_close($ch);*/


	/*$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $curl_url);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$response = json_decode(curl_exec($ch));


		$curl_getinfo = curl_getinfo($ch); //getting information
		$header_size = $curl_getinfo['header_size'];
		$header = substr($response, 0, $header_size); //header
		$body = substr($response, $header_size); //body, file being downloaded

	curl_close($ch);

	//$result = json_decode(file_get_contents ($body)); //get content out of the file

	// $results = json_decode($response, true);
	// print_r($results);
	echo $response; //echoing body to the page
/*}  else {
  header('HTTP/1.0 403 Forbidden');
	header("Cache-Control: must-revalidate, max-age=0");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
}*/
?>
