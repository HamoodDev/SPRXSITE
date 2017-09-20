<section class="content-header">
      <h1>
        Create New User
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo SiteURL; ?>/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php"><i class="fa fa-cog"></i> Admin</a></li>
        <li class="active">Create User</li>
      </ol>
    </section>
    <section class="content">
        <div class="col-md-12">
		<center>
		
		</center>
	</div>
     	<?php
		  $PG = $_GET['p']; 
		?>
		<div class="col-md-13">
          <div class="box box-solid box-<?php echo $theme2; ?>">
            <div class="box-header with-border">
			  <div class="pull-right box-title">
				<span class="label label-warning"><h3 class="box-title"><?php echo $PG; ?></h3></span>
				<a href="index.php" class="btn btn-default btn-sm"><i class="fa fa-backward"></i> Back</a>
			  </div>
              <h2 class="box-title">Create User</h2>
            </div>
            <div class='box-body'>
              <div class="box-body">
                <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Username:</label>
                  <input type="text" class="form-control" id="Username" placeholder="Enter Username">
                </div>
                    <label for="License">License:</label>
                <div class="input-group">
                    <input type="text" placeholder="Enter License" id="License" class="form-control">
					<span onclick="Gen()" class="btn btn-<?php echo $theme2; ?> input-group-addon"><i class="fa fa-refresh"></i></span>
                </div>
              </div>
              <div class="box-footer">
                <button onclick="CreateUser()" class="btn btn-<?php echo $theme2; ?> btn-block">Create user</button>
              </div>
                    </div>
		  </div>
        </div>
		<script>
		function Gen(){
		$.ajax ({
  		      url: "../plugins/SupportTickets/get.php",
  	          type : "POST",
  	          cache : false,
  	          success: function(response)
  	          {
		           document.getElementById("License").value = response;
  	          }
  	    });
	}
  function CreateUser(){
	    var Username = document.getElementById("Username").value;
	    var License = document.getElementById("License").value;
	    var email = document.getElementById("email").value;
		$.ajax ({
  		      url: "../plugins/ADMIN/CreateUser.php",
  	          type : "POST",
			  data : "username="+Username+"&email="+email+"&license="+License,
  	          cache : false,
  	          success: function(response)
  	          {
                   $.toaster({ priority : 'success', title : 'Success', message : '</br>User Created!'});
				   setTimeout(location.reload.bind(location), 1000);
  	          }
  	    });
	}</script>