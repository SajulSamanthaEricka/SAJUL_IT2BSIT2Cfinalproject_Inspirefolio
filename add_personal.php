<?php


session_start();

//check if the button id clicked
if(isset($_REQUEST['publish'])){


         //open xml file
	     $personals = simplexml_load_file('files/personal.xml');

	    //prepare all tags and data
	    $personal = $personals->addChild('personal');

	    $personal->addChild('name', $_REQUEST['personal_name']);
	    $personal->addChild('address', $_REQUEST['personal_address']);
	    $personal->addChild('email', $_REQUEST['personal_email']);
	    $personal->addChild('birthdate', $_REQUEST['personal_birthdate']);
	    $personal->addChild('content', $_REQUEST['personal_content']);

        
        //save the data

        $dom=new DomDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($personals->asXML());
        $dom->save('files/personal.xml');
	  
	    //send a message to index
	    $_SESSION['message'] = "Personal Successfully Posted";
	    header("location: index.php");

    } else {

    	$_SESSION['message'] = "Fill up the form properly";
    	header("location: index.php");
   }

?>