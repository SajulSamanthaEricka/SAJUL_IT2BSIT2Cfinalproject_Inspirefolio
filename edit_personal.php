<?php

session_start();

if(isset($_REQUEST['edit_personal'])){

	$personal = simplexml_load_file('files/personal.xml');

    foreach($personal->personal as $personal){


    	if($blog->id == $_POST['personal_id']){
    		$personal->address = $_POST['personal_address'];
    		$personal->email = $_POST['personal_email'];
    		$personal->birthdate = $_POST['personal_birthdate'];
    		$personal->content= $_POST['personal_content'];
    		break;


    	}
    

}
file_put_contents('files/personal.xml', $personal->asXML());
$_SESSION['message'] = "Personal Succesfully Updated";
header("index.php");


}
else{

	$_SESSION['message'] = "select personal to edit first";
	header("location: index.php");
}



?>