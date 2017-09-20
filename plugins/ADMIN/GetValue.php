<?php
    include ("../../config/connect.class.php");
    include ("../../config/main.class.php");
	if( !isset( $_SESSION['username'] ) ){
 		session_start();
    }
	if( isset( $_SESSION['username'] ) ){
	    $DB->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
		$ID = $_POST['id'];
		echo $DB->GET_PHARSE($ID);
    }
?>