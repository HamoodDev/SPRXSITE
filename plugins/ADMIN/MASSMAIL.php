<?php
    include ("../../config/main.class.php");
    include ("../../config/connect.class.php");
	if( !isset( $_SESSION['username'] ) ){
 		session_start();
    }
	if( isset( $_SESSION['username'] ) ){
	    $DB->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
		
		$Subject = $_POST['Subject'];
		$Text = $_POST['Text'];
		
		$headers = "From: " . SiteEmail . "\r\n";
		$headers .= "CC: " . SiteEmail . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		$DB->IOG("Sent Mass Email [". $Subject ."]");
		
		$stmt = $DB->DB->prepare("SELECT * FROM `users`");
    	$ok = $stmt->execute();
		$result = $stmt -> fetchAll();
		
		foreach( $result as $row ) {
			$Message = "<html style='height: auto; min-height: 100%;'><head>  <meta charset='utf-8'>  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>  <link rel='stylesheet' href='". SiteURL ."/bootstrap/css/bootstrap.min.css'>  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'><link rel='stylesheet' href='". SiteURL ."/plugins/fullcalendar/fullcalendar.min.css'><link rel='stylesheet' href='". SiteURL ."/plugins/fullcalendar/fullcalendar.print.css' media='print'><link rel='stylesheet' href='". SiteURL ."/dist/css/AdminLTE.min.css'><link rel='stylesheet' href='". SiteURL ."/dist/css/skins/_all-skins.min.css'><link rel='stylesheet' href='". SiteURL ."/plugins/iCheck/flat/blue.css'><link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic'><body><section class='content'>
	<div class='col-md-9'>
	<div class='box box-primary'>
            <div class='box-body no-padding'>
              <div class='mailbox-read-info'>
                <h3>". $Subject ."</h3>
                <h5>From: ". SiteName ." (". SiteEmail .")
                  <span class='mailbox-read-time pull-right'>15 Feb. 2016 11:03 PM</span></h5>
              </div>
              <div class='mailbox-read-message'>
                <p>Hello ". $row['username'] .",</p><br>
                <p>". $Text ."</p>

                <p>Thanks, <b>". SiteName ."</b></p>
              </div>
            </div>
          </div>
        </div>
    </section><script src='". SiteURL ."/plugins/jQuery/jquery-3.1.1.min.js'></script><script src='". SiteURL ."/bootstrap/js/bootstrap.min.js'></script><script src='". SiteURL ."/plugins/slimScroll/jquery.slimscroll.min.js'></script><script src='". SiteURL ."/plugins/fastclick/fastclick.js'></script><script src='". SiteURL ."/dist/js/adminlte.min.js'></script><script src='". SiteURL ."/dist/js/demo.js'></script></body></html>";
			mail($row['email'], $Subject, $Message, $headers);
		}
		$DB->IOG("Sent Mass Email [". $Subject ."]");
    }
?>