<?php
include 'apikey.php';
$apiToken=KEY;
$website="https://api.telegram.org/bot".$apiToken;

$update=file_get_contents($website."/getupdates");
//$update=file_get_contents("php://input");
$updateArray=json_decode($update,true);
//var_dump($updateArray);
print_r($update);
/*
$cont=count($updateArray['result'])-1;
if(count($updateArray['result'])>0){
	$name=$updateArray['result'][$cont]['message']['from']['first_name'];
	if(isset($updateArray['result'][$cont]['message']['from']['last_name'])){
		$name.=" ".$updateArray['result'][$cont]['message']['from']['last_name'];
	}
	$chatId=$updateArray["result"][$cont]['message']['chat']['id'];

	$text=$updateArray["result"][$cont]['message']['text'];
}

if($text==="/kaixo"){
	$mensaje="Kaixo, soy un bot creado por Ierai";
}else if($text==="/quiensoy"){
	$mensaje="Eres...".$name." ¿He acertado?";
}else{
	$mensaje="No entiendo tu mensaje, pero puedes visitar https://github.com/ieraielizondo para ver el código.";
}

*/

?>
