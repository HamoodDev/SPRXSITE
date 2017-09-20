<?php
    include ("../../../config/main.class.php");
    include ("../../../config/connect.class.php");
	if( !isset( $_SESSION['username'] ) ){
 		session_start();
    }
	if( isset( $_SESSION['username'] ) ){
	    $DB->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
		$statement = $DB->DB->prepare( "DELETE FROM `logs` WHERE `type` = 'log'" );
    	$statement->execute();
    }
?>
