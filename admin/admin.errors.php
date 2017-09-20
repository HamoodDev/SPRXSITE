<?php
   include ("../config/connect.class.php");
   include ("../config/main.class.php");
   include ("../config/user.class.php");
   if($MAIN->IsLoggedIn() && $MAIN->IsAdmin() || $MAIN->IsStaff()) {
	   $theme1 = $DB->GetTheme1();
	   $theme2 = $DB->GetTheme2();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo SiteName; ?> - Admin - Errors</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-<?php echo $theme1; ?> sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="../index2.html" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b><?php echo SiteName; ?></b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="../#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            <a href="../#" class="dropdown-toggle" data-toggle="dropdown">
              <?php
		        echo "<img ";
				$IMG = $USER->GetImgUrlGetImgUrl($_SESSION[SiteName]['username']);
			    if (strpos($IMG, 'https://') !== false) {
    			  	echo "src='". $USER->GetImgUrlGetImgUrl($_SESSION[SiteName]['username'])."'";
			    }
				else{
					echo "src='dist/img/users/" . $USER->GetImgUrlGetImgUrl($_SESSION[SiteName]['username'])."'";
				}
				echo "  class='user-image'/>";
			?>
              <span class="hidden-xs"><?php echo $DB->SelectCustom("username", "users", "license", $_SESSION[SiteName]['license']); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <?php
		        echo "<img ";
				$IMG = $USER->GetImgUrlGetImgUrl($_SESSION[SiteName]['username']);
			    if (strpos($IMG, 'https://') !== false) {
    			  	echo "src='". $USER->GetImgUrlGetImgUrl($_SESSION[SiteName]['username'])."'";
			    }
				else{
					echo "src='dist/img/users/" . $USER->GetImgUrlGetImgUrl($_SESSION[SiteName]['username'])."'";
				}
				echo " class='img-circle'/>";
			?>
                <p>
                  <?php echo $DB->SelectCustom("username", "users", "license", $_SESSION[SiteName]['license']); ?>
                </p>
              </li>
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="../#"><i class="fa fa-cog"></i> Settings</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="../profile.php"><i class="fa fa-user"></i> Profile</a>
                  </div>
                </div>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <?php
		        echo "<img ";
				$IMG = $USER->GetImgUrlGetImgUrl($_SESSION[SiteName]['username']);
			    if (strpos($IMG, 'https://') !== false) {
    			  	echo "src='". $USER->GetImgUrlGetImgUrl($_SESSION[SiteName]['username'])."'";
			    }
				else{
					echo "src='dist/img/users/" . $USER->GetImgUrlGetImgUrl($_SESSION[SiteName]['username'])."'";
				}
				echo " class='img-circle'/>";
			?>
        </div>
        <div class="pull-left info">
          <p><?php echo $DB->SelectCustom("username", "users", "license", $_SESSION[SiteName]['license']); ?></p>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search..." disabled>
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat" disabled><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main</li>
		<li class=""><a href="../index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class=""><a href="../Chat.php"><i class="fa fa-users"></i> Chat</a></li>
        <li class=""><a href="../Downloads.php"><i class="fa fa-download"></i> Downloads</a></li>
        <li class=""><a href="../Support.php"><i class="fa fa-ticket"></i> Support Tickets</a></li>
		<li class="header">You</li>
		<li class=""><a href="../profile.php"><i class="fa fa-user"></i> Profile</a></li>
		<?php if($MAIN->IsAdmin()) { ?>
		<li class="header">Control Panel [Admin]</li>
        <li class=""><a href="../settings.admin.php"><i class="fa fa-cog"></i> Settings</a></li>
		<li class=""><a href="../users.admin.php"><i class="fa fa-users"></i> Users</a></li>
        <li class=""><a href="../tickets.admin.php"><i class="fa fa-ticket"></i> Support Tickets</a></li>
        <li class=""><a href="../logs.admin.php"><i class="fa fa-history"></i> Logs</a></li>
		<?php } ?>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Admin - Errors
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin - Errors</li>
      </ol>
    </section>
    <section class="content">
        <div class="col-md-12">
		<center>
		
		</center>
	</div>
		<div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $DB->SelectAllCount("users"); ?></h3>
              <p>Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $DB->SelectCustomCount("users", "rank", "4"); ?></h3>
              <p>Staff</p>
            </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $DB->SelectAllCount("mydownloads"); ?></h3>
              <p>Downloads</p>
            </div>
            <div class="icon">
              <i class="fa fa-download"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>EMPTY</h3>
              <p>EMPTY</p>
            </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
          </div>
        </div>
      </div>
		<div class="col-md-13">
          <div class="box box-solid box-<?php echo $theme2; ?>">
            <div class="box-header with-border">
              <h3 class="box-title">[<b><?php echo $DB->SelectCustomCount("logs", "type", "error"); ?></b>] Total Errors</h3>
			  <div class="box-tools">
			    <button onclick="ClearLog()" class="btn bg-navy margin btn-xs">Clear</button>
			  </div>
            </div>
            <div class="box-body">
			<div class='box'>
            <div class='box-body'>
              <div id='example2_wrapper' class='dataTables_wrapper form-inline dt-bootstrap'><div class='row'><div class='col-sm-6'>
			  </div>
			  <div class='col-sm-6'></div></div><div class='row'>
			  <div class='col-sm-12'>
			  <table id='example2' class='table table-bordered table-hover dataTable' role='grid' aria-describedby='example2_info'>
                <thead>
                <tr role='row'>
				<th class='sorting_asc' tabindex='0' aria-controls='example2' rowspan='1' colspan='1' aria-sort='ascending'>Username</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Action</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Date And Time</th>
				</tr>
                </thead>
                <tbody>
			<?php
			$DB->db_connect();
			$stmt = $DB->DB->prepare("SELECT * FROM `logs` WHERE `type` = 'error'");
    		$ok = $stmt->execute();
			$result = $stmt -> fetchAll();
			foreach( $result as $rows ) {
				echo "
                <tr role='row' class='even'>
                  <td class='sorting_1'>". $rows['username'] ."</td>
                  <td>". $rows['action'] ."</td>
                  <td>". $MAIN->time_elapsed_string($rows['DateTime']) ."</td>
                </tr>";
			}
			?>
				</tbody>
                <tfoot>
                <tr>
                </tfoot>
              </table></div></div>
            </div>
          </div>
          </div>
        </div>
		</div>
    </section>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> <?php echo Version; ?>
    </div>
    <strong>Copyright &copy; <?php echo "2016 - ".date("Y"); ?> <a href="../https://adminlte.io"><?php echo Creator; ?></a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
  function ClearLog(){
		$.ajax({
			type: "POST",
			url: "plugins/ADMIN/logs/CLEAR.php",
			success: function(html) {
				location.reload();
			}
		});
  }
</script>
</body>
</html>
   <?php } else { header("Location: login.php"); } ?>