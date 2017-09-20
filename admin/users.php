<section class="content-header">
      <h1>
        Customers
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php"><i class="fa fa-cog"></i> Admin</a></li>
        <li class="active">Customers</li>
      </ol>
    </section>
    <section class="content">
        <div class="col-md-12">
		<center>
		
		</center>
	</div>
    <?php
	   $ID_FILTER = $_SESSION["customreffervalue"];
	   $ID = explode("php?type=", $ID_FILTER);
	?>
	<?php
		  $PG = $_GET['p']; 
		  $PageTitle = explode(".", $PG)[0];
		?>
		<div class="col-md-13">
          <div class="box box-solid box-<?php echo $theme2; ?>">
            <div class="box-header with-border">
			  <div class="pull-right box-title">
				<span class="label label-warning"><h3 class="box-title"><?php echo $PG; ?></h3></span>
				<a href="index.php" class="btn btn-default btn-sm"><i class="fa fa-backward"></i> Back</a>
			  </div>
              <h2 class="box-title">Admin > <?php echo $PageTitle; ?></h2>
            </div>
            <div class="box-body">
		<div class="col-md-13">
          <div class="box box-solid box-<?php echo $theme2; ?>">
            <div class="box-header with-border">
              <h3 class="box-title">[<b><?php echo $DB->SelectAllCount("users"); ?></b>] Total Users</h3>
            </div>
            <div class="box-body">
			<div class='box'>
            <div class='box-body'>
              <div id='example2_wrapper' class='dataTables_wrapper form-inline dt-bootstrap'><div class='row'>
			  <div class='col-sm-12'>
			  <table id='example2' class='table table-bordered table-hover dataTable' role='grid' aria-describedby='example2_info'>
                <thead>
                <tr role='row'>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>ID</th>
				<th class='sorting_asc' tabindex='0' aria-controls='example2' rowspan='1' colspan='1' aria-sort='ascending'>Username</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>License</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Email</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Access Level</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Custom Title</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Times Logged In</th>
				<th>Actions</th>
				</tr>
                </thead>
                <tbody>
			<?php
			    $DB->db_connect();
				if($ID[1] == "all"){
					$stmt = $DB->DB->prepare("SELECT * FROM `users` ORDER BY `id` ASC");
    				$ok = $stmt->execute();
					$result = $stmt -> fetchAll();
					foreach( $result as $rows ) {
						echo "
                		    <tr role='row' class='even'>
                		        <td class='sorting_1'>". $rows['id'] ."</td>
                		        <td class='sorting_1'>". $rows['username'] ."</td>
                		        <td>". $rows['license'] ."</td>
                		        <td>". $rows['email'] ."</td>
                		        <td>". $MAIN->GetRank($rows['rank']) ."</td>
                		        <td>". $rows['customtitle'] ."</td>
                		        <td>". $DB->GetTimesLoggedIn($rows['username']) ."</td>
                		        <td><span onClick='DeleteUser(". $rows['id'] .")' class='text-danger fa fa-remove'></span> <a href='index.php?p=edituser.php?id=". $rows['id'] ."'><span class='fa fa-edit'></span></a></td>
                            </tr>";
			        }
				}
				if($ID[1] == "admin"){
					$stmt = $DB->DB->prepare("SELECT * FROM `users` WHERE `rank` = '4' ORDER BY `id` ASC");
    				$ok = $stmt->execute();
					$result = $stmt -> fetchAll();
					foreach( $result as $rows ) {
						echo "
                		    <tr role='row' class='even'>
                		        <td class='sorting_1'>". $rows['id'] ."</td>
                		        <td class='sorting_1'>". $rows['username'] ."</td>
                		        <td>". $rows['license'] ."</td>
                		        <td>". $rows['email'] ."</td>
                		        <td>". $MAIN->GetRank($rows['rank']) ."</td>
                		        <td>". $rows['customtitle'] ."</td>
                		        <td>". $DB->GetTimesLoggedIn($rows['username']) ."</td>
                		        <td><span onClick='DeleteUser(". $rows['id'] .")' class='text-danger fa fa-remove'></span> <a href='index.php?p=edituser.php?id=". $rows['id'] ."'><span class='fa fa-edit'></span></a></td>
                            </tr>";
			        }
				}
				if($ID[1] == "staff"){
				   $stmt = $DB->DB->prepare("SELECT * FROM `users` WHERE `rank` = '3' ORDER BY `id` ASC");
    				$ok = $stmt->execute();
					$result = $stmt -> fetchAll();
					foreach( $result as $rows ) {
						echo "
                		    <tr role='row' class='even'>
                		        <td class='sorting_1'>". $rows['id'] ."</td>
                		        <td class='sorting_1'>". $rows['username'] ."</td>
                		        <td>". $rows['license'] ."</td>
                		        <td>". $rows['email'] ."</td>
                		        <td>". $MAIN->GetRank($rows['rank']) ."</td>
                		        <td>". $rows['customtitle'] ."</td>
                		        <td>". $DB->GetTimesLoggedIn($rows['username']) ."</td>
                		        <td><span onClick='DeleteUser(". $rows['id'] .")' class='text-danger fa fa-remove'></span> <a href='index.php?p=edituser.php?id=". $rows['id'] ."'><span class='fa fa-edit'></span></a></td>
                            </tr>
						";
			        }
				}
				if($ID[1] == "banned"){
					$stmt = $DB->DB->prepare("SELECT * FROM `users` WHERE `rank` = '0' ORDER BY `id` ASC");
    				$ok = $stmt->execute();
					$result = $stmt -> fetchAll();
					foreach( $result as $rows ) {
						echo "
                		    <tr role='row' class='even'>
                		        <td class='sorting_1'>". $rows['id'] ."</td>
                		        <td class='sorting_1'>". $rows['username'] ."</td>
                		        <td>". $rows['license'] ."</td>
                		        <td>". $rows['email'] ."</td>
                		        <td>". $MAIN->GetRank($rows['rank']) ."</td>
                		        <td>". $rows['customtitle'] ."</td>
                		        <td>". $DB->GetTimesLoggedIn($rows['username']) ."</td>
                		        <td><span onClick='DeleteUser(". $rows['id'] .")' class='text-danger fa fa-remove'></span> <a href='index.php?p=edituser.php?id=". $rows['id'] ."'><span class='fa fa-edit'></span></a></td>
                            </tr>
						";
			        }
				}
			?>
				</tbody>
              </table></div></div>
            </div>
          </div>
          </div>
        </div>
		</div>
  </div>
            </div>
		  </div>
        </div>
	<script>
  function DeleteUser(id){
		$.ajax ({
  		      url: "../plugins/ADMIN/DELETEUSER.php",
  	          type : "POST",
			  data : "id="+id,
  	          cache : false,
  	          success: function(response)
  	          {
                   $.toaster({ priority : 'success', title : 'Success', message : '</br>User Deleted!'});
				   setTimeout(location.reload.bind(location), 1000);
  	          }
  	    });
	}
	</script>