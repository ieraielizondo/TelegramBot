<?php
include 'apikey.php';
$apiToken=KEY;
$website="https://api.telegram.org/bot".$apiToken;
$emojis=array(
	array("nombre"=>"grining_face","codigo"=>'\uD83D\uDE00'),
	array("nombre"=>"grinning_face2","codigo"=>'\uD83D\uDE01'),
	array("nombre"=>"joy","codigo"=>'\uD83D\uDE02'),
	array("nombre"=>"gafas","codigo"=>'\ud83d\ude0e')
	);

$update=file_get_contents("php://input");
//$update=file_get_contents($website."/getupdates");
$updateArray=json_decode($update,true);
//var_dump($updateArray);
//print_r($update);
/*
$cont=count($updateArray['result'])-1;
if(count($updateArray['result'])>0){
	$name=$updateArray['result'][$cont]['message']['from']['first_name'];
	if(isset($updateArray['result'][$cont]['message']['from']['last_name'])){
		$name.=" ".$updateArray['result'][$cont]['message']['from']['last_name'];
	}
	$chatId=$updateArray["result"][$cont]['message']['chat']['id'];

	$text=$updateArray["result"][$cont]['message']['text'];
}*/
$name=$updateArray['message']['from']['first_name'];
if(isset($updateArray['message']['from']['last_name'])){
		$name.=" ".$updateArray['message']['from']['last_name'];
		$chatId=$updateArray['message']['chat']['id'];

	$text=$updateArray['message']['text'];
	}

if($text==="/kaixo"){
	$mensaje="Kaixo, soy un bot creado por Ierai";
}else if($text==="/quiensoy"){
	$mensaje="Eres...".$name." ¿He acertado?"." ".getEmoji("gafas");
}else{
	$mensaje="No entiendo tu mensaje, pero puedes visitar https://github.com/ieraielizondo para ver el código.";
}

sendMessage($chatId,$mensaje);


function sendMessage($chatId,$mensaje){
	$url=$GLOBALS['website']."/sendmessage?chat_id=".$chatId."&text=".urlencode($mensaje);
	file_get_contents($url);
}

function getEmoji($nombre){
	for($i=0;$i<count($GLOBALS['emojis']);$i++){
		if($GLOBALS['emojis'][$i]['nombre']===$nombre){
			$codigo=$GLOBALS['emojis'][$i]['codigo'];
			return json_decode('"'.$codigo.'"');			
		}		
	}	
}


?>
