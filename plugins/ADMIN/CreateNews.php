<?php
    include ("../../config/configs.php");
    include ("../../config/main.class.php");
    include ("../../config/connect.class.php");
	if( !isset( $_SESSION['username'] ) ){
 		session_start();
    }
	if( isset( $_SESSION['username'] ) ){
	    $DB->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
		$newstitle = $_POST['newstitle'];
		$newstext = $_POST['newstext'];
		$newsposter = $_SESSION['username'];
		$statement = $DB->DB->prepare( "INSERT INTO `news` (`Title`, `Text`, `Poster`) VALUES ('$newstitle', '$newstext', '$newsposter')" );
    	$statement->execute();
		$DB->IOG("Created News [$newstitle]");
    }
?>