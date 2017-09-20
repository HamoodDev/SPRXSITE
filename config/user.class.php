<?php
    class User {
		public function SetImgUrl($LINK){
            $DB2 = new Database();
			$statement = $DB2->DB->prepare( "UPDATE `users` SET `img` = '$LINK' WHERE `username` = '". $_SESSION['username']."'" );
    		$statement->execute();
		}
		public function GetImgUrlGetImgUrl($username){
            $DB2 = new Database();
			return $DB2->SelectCustom("img", "users", "username", $username);
		}
	}
	$USER = new User();
?>