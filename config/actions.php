<?php
    include ("configs.php");
    include ("main.class.php");
    include ("login.class.php");
    if(isset($_POST['login']) && isset($_POST['key'])){
	       $KEY = $_POST['key'];
		   if($LoginClass->Login_n($KEY) == "Logged In."){
			   header("Location: ../index.php");
		   }
		   else {
			   header("Location: ../login.php");
		   }
    }
	if(isset($_POST['GetChat'])){
				    $DW = $DB->SelectAll("downloads");
					foreach($DW as $row){
						echo "<tr>
                  <td><center>1</center></td>
                  <td>". $row['filename'] ."</td>
                  <td><center>". $row['size'] ."</center></td>
                  <td><center>". $row['type'] ."</center></td>
                  <td><center>". $row['Version'] ."</center></td>
                </tr>";
					}
	}
?>