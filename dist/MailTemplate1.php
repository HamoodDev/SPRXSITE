<?php include('../config/configs.php'); ?>
<html style='height: auto; min-height: 100%;'><head>
  <meta charset='utf-8'>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link rel='stylesheet' href='<?php echo SiteURL; ?>/bootstrap/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
  <link rel='stylesheet' href='<?php echo SiteURL; ?>/plugins/fullcalendar/fullcalendar.min.css'>
  <link rel='stylesheet' href='<?php echo SiteURL; ?>/plugins/fullcalendar/fullcalendar.print.css' media='print'>
  <link rel='stylesheet' href='<?php echo SiteURL; ?>/dist/css/AdminLTE.min.css'>
  <link rel='stylesheet' href='<?php echo SiteURL; ?>/dist/css/skins/_all-skins.min.css'>
  <link rel='stylesheet' href='<?php echo SiteURL; ?>/plugins/iCheck/flat/blue.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic'>
<body>

    <section class='content'>
	  
	  
	  
	  
	  
	  
        <div class='col-md-9'>
          <div class='box box-primary'>
            <div class='box-body no-padding'>
              <div class='mailbox-read-info'>
                <h3><?php echo $_GET['Subject']; ?></h3>
                <h5>From: <?php echo SiteName; ?> (<?php echo SiteEmail; ?>)
                  <span class='mailbox-read-time pull-right'>15 Feb. 2016 11:03 PM</span></h5>
              </div>
              <div class='mailbox-read-message'>
                <p>Hello <?php echo $_GET['Name']; ?>,</p><br>
                <p><?php echo $_GET['Text']; ?></p>

                <p>Thanks, <b><?php echo SiteName; ?></b></p>
              </div>
            </div>
          </div>
        </div>
		
		
    </section>
<script src='<?php echo SiteURL; ?>/plugins/jQuery/jquery-3.1.1.min.js'></script>
<script src='<?php echo SiteURL; ?>/bootstrap/js/bootstrap.min.js'></script>
<script src='<?php echo SiteURL; ?>/plugins/slimScroll/jquery.slimscroll.min.js'></script>
<script src='<?php echo SiteURL; ?>/plugins/fastclick/fastclick.js'></script>
<script src='<?php echo SiteURL; ?>/dist/js/adminlte.min.js'></script>
<script src='<?php echo SiteURL; ?>/dist/js/demo.js'></script>


</body></html>