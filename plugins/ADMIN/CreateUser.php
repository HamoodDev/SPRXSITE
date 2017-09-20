<?php
    include ("../../config/connect.class.php");
    include ("../../config/main.class.php");
	if( !isset( $_SESSION['username'] ) ){
 		session_start();
    }
	if( isset( $_SESSION['username'] ) ){
	$DB->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
		$USERNAME = $_POST['username'];
		$EMAIL = $_POST['email'];
		$LICENSE = $_POST['license'];
		$DB->IOG("Created User [". $_POST['username'] ."]");
		$statement = $DB->DB->prepare( "INSERT INTO `users`(`username`, `license`, `email`, `customtitle`, `country`, `city`, `bio`) VALUES ('$USERNAME', '$LICENSE', '$EMAIL', '', '', '', '')" );
    	$statement->execute();
    }
?>