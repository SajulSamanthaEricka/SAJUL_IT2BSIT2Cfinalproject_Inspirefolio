<?php

session_start();



$personal = simplexml_load_file('files/personal.xml');

//create an iterator
$index = 0;
$i = 0;

foreach($personal->personal as $personal){

	if($personal-> id = $id){
		$index = $i;
		break;
	}
	$i++;

}
//remove if the ID matches
unset($personal->personal[$index]);
file_put_contents('files/personal.xml',$personal->asXML());

$_SESSION['message'] = "Personal Succesfully Deleted";
header("location: index.php");



?>