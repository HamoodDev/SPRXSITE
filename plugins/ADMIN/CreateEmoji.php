<?php
    include ("../../config/connect.class.php");
    include ("../../config/main.class.php");
    include ("../Emoji/emoji.php");
	if( !isset( $_SESSION['username'] ) ){
 		session_start();
    }
	if( isset( $_SESSION['username'] ) ){
			$DB->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
			$IMGURL = $_POST["IMGURL"];
			$IMGREPLACE = $_POST["IMGREPLACE"];
			$IMGNAME = $_POST["IMGNAME"];
			$statement = $DB->DB->prepare( "INSERT INTO `emojis` (`Name`, `Wut`, `url`) VALUES ('$IMGNAME', '$IMGREPLACE', '$IMGURL')" );
    		$statement->execute();
    }
?>