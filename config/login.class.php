<?php
    include ("connect.class.php");
    class Login {
       public function Login_n($License) 
	   {
		    if(!empty($License)) {
			    $DBB = new Database();
	            if($DBB->SelectCustomCount("users", "license", $License) != "0") {
				    $Rank = $DBB->SelectCustom("rank", "users", "license", $License);
				    if($Rank == "0") {
					    return "License Banned.";
				    }
			   	    $_SESSION['license'] = $License;
					   	$IP = $DBB->GetUserIP();
					if( empty($DBB->SelectCustom("username", "users", "license", $License)) || empty($DBB->SelectCustom("email", "users", "license", $License)) ) {
						$_SESSION['profileupdateneeded'] = TRUE;
				        $_SESSION['rank'] = $Rank;
				        $_SESSION['id'] = $DBB->SelectCustom("id", "users", "license", $License);
				        $_SESSION['ip'] = $IP;
					}
					else {
						$_SESSION['username'] = $DBB->SelectCustom("username", "users", "license", $License);
				       	$_SESSION['email'] = $DBB->SelectCustom("email", "users", "license", $License);
				        $_SESSION['rank'] = $Rank;
				        $_SESSION['id'] = $DBB->SelectCustom("id", "users", "license", $License);
				        $_SESSION['ip'] = $IP;
					}
                    $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$IP));
                    if($query && $query['status'] == 'success') {
					    $DBB->execute("UPDATE `users` SET `country` = '".$query['country']."', `city` = '".$query['city']."' WHERE `id` = '".$_SESSION['id']."'");
                    }
	   	    	    $DBB->LogLogin($_SESSION['username'], "PC Login");
	   	    	    return "Logged In.";
	       	    }
	       	    return "Failed,\nLicense Does Not Exist."; 
			}
		    else { 
		   	    return "failed"; 
		    }
       }
    }
	$LoginClass = new Login();
?>