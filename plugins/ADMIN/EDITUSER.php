<?php
    include ("../../config/connect.class.php");
    include ("../../config/main.class.php");
	if( !isset( $_SESSION['username'] ) ){
 		session_start();
    }
	if( isset( $_SESSION['username'] ) ){
	$DB->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
		$ID = $_POST['id'];
		$EMAIL = $_POST['email'];
		$RANK = $_POST['rank'];
		$MESSAGE = "";
		$CURRANK = $DB->GetUSER('rank', $ID);
		if($RANK != $CURRANK) {
			$MESSAGE = $MESSAGE . "Changed Rank From [$CURRANK] to [$RANK]";
		}
		if($EMAIL != $DB->GetUSER("email", $ID)) {
			$MESSAGE = $MESSAGE . "</br>Changed Email To [$EMAIL]";
		}
		$DB->IOG("Edited User [". $DB->GetUSER("username", $ID) ."] $MESSAGE");
		$statement = $DB->DB->prepare( "UPDATE `users` SET `email` = '$EMAIL', `rank` = '$RANK' WHERE `id` = '$ID'" );
    	$statement->execute();
    }
?>