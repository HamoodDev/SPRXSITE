<?php
    include ("../../config/main.class.php");
    include ("../../config/connect.class.php");
	if( !isset( $_SESSION['username'] ) ){
 		session_start();
    }
	if( isset( $_SESSION['username'] ) ){
	    $DB->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
		$id = $_POST['id'];
		$DB->IOG("Un-Banned User [". $DB->GetUSER("username", $id) ."]");
		$statement = $DB->DB->prepare( "UPDATE `users` SET `rank` = '1' WHERE `id` = '$id'" );
    	$statement->execute();
    }
?>