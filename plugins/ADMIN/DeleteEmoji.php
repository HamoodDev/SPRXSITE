<?php
    include ("../../config/connect.class.php");
    include ("../../config/main.class.php");
    include ("../Emoji/emoji.php");
	if( !isset( $_SESSION['username'] ) ){
 		session_start();
    }
	if( isset( $_SESSION['username'] ) ){
		$DB->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
		$id = $_POST["id"];
		$statement = $DB->DB->prepare( "DELETE FROM `emojis` WHERE `id` = '$id' " );
    	$statement->execute();
    }
?>