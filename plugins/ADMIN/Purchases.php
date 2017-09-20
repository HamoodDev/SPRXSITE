<?php
    include ("../../config/configs.php");
    include ("../../config/main.class.php");
    include ("../../config/connect.class.php");
	if( !isset( $_SESSION['username'] ) ){
 		session_start();
    }
	if( isset( $_SESSION['username'] ) ){
	    $DB->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
		if(isset($_POST['val'])){
		    $id = $_POST['val'];
		    $DB->IOG((($id == "1") ? "Disabled" : "Enabled") ." Purchases.");
		    $statement = $DB->DB->prepare( "UPDATE `custom_settings` SET `enabled` = '$id' WHERE `name` = 'DisablePurchases'" );
    	    $statement->execute();
		}
		else if(isset($_POST['email'])){
		    $id = $_POST['email'];
		    $DB->IOG((($id == "1") ? "Disabled" : "Enabled") ." Purchases.");
		    $statement = $DB->DB->prepare( "UPDATE `custom_settings` SET `enabled` = '$id' WHERE `name` = 'PaypalEmail'" );
    	    $statement->execute();
		}
    }
?>