<?php 
    $ID_FILTER = $_SESSION["customreffervalue"];
    $ID = explode("php?id=", $ID_FILTER)[1];
?>
<section class="content-header">
      <h1>
        Edit User [<?php echo $DB->GetUSER("username", $ID); ?>]
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php"><i class="fa fa-cog"></i> Admin</a></li>
        <li class="active">Edit User [<?php echo $DB->GetUSER("username", $ID); ?>]</li>
      </ol>
    </section>
    <section class="content">
        <div class="col-md-12">
		<center>
		
		</center>
	</div>

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
              <h2 class="box-title">Edit User [<?php echo $DB->GetUSER("username", $ID); ?>]</h2>
            </div>
            <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="inputEmail" name="inputEmail" placeholder="example@example.com" value="<?php echo $DB->GetUSER("email", $ID); ?>" type="email">
                    <br></div>
                  </div>
				  <div class="form-group">
                    <label for="inputRank" class="col-sm-2 control-label">Rank:</label>
                    <div class="col-sm-10">
                       <select id="inputRank" name="inputRank" class="form-control">
					      <option value="0" <?php echo (($DB->GetUSER("rank", $ID) == "0") ? "selected" : ""); ?> disabled>Banned</option>
					      <option value="1" <?php echo (($DB->GetUSER("rank", $ID) == "1") ? "selected" : ""); ?>>User</option>
					      <option value="2" <?php echo (($DB->GetUSER("rank", $ID) == "2") ? "selected" : ""); ?>>Staff</option>
					      <option value="3" <?php echo (($DB->GetUSER("rank", $ID) == "3") ? "selected" : ""); ?>>Admin</option>
					      <option value="4" <?php echo (($DB->GetUSER("rank", $ID) == "4") ? "selected" : ""); ?>>Owner</option>
					   </select><br>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button id="nigga" onClick="EditUser(<?php echo $ID; ?>)" class="btn btn-purple">Save Changes</button>
					  <?php echo (($DB->GetUSER("rank", $ID) == "0") ? "<button onClick='UnbanUser($ID)' class='btn btn-success'>Unban User</button>" : "<button onClick='BanUser($ID)' class='btn btn-danger'>Ban User</button>"); ?>
                    </div>
                  </div>
            </div>
		  </div>
        </div>
	<script>
  function EditUser(id){
	    var inputEmail = document.getElementById("inputEmail").value;
	    var inputRank = document.getElementById("inputRank");
		var inputRank2 = inputRank.options[inputRank.selectedIndex].value
		$.ajax ({
  		      url: "../plugins/ADMIN/EDITUSER.php",
  	          type : "POST",
			  data : "id="+id+"&email="+inputEmail+"&rank="+inputRank2,
  	          cache : false,
  	          success: function(response)
  	          {
                   $.toaster({ priority : 'success', title : 'Success', message : '</br>User Saved!'});
				   setTimeout(location.reload.bind(location), 1000);
  	          }
  	    });
	}
  function BanUser(id){
		$.ajax ({
  		      url: "../plugins/ADMIN/BANUSER.php",
  	          type : "POST",
			  data : "id="+id,
  	          cache : false,
  	          success: function(response)
  	          {
                   $.toaster({ priority : 'success', title : 'Success', message : '</br>Banned User!'});
				   setTimeout(location.reload.bind(location), 1000);
  	          }
  	    });
	}
  function UnbanUser(id){
		$.ajax ({
  		      url: "../plugins/ADMIN/UNBANUSER.php",
  	          type : "POST",
			  data : "id="+id,
  	          cache : false,
  	          success: function(response)
  	          {
                   $.toaster({ priority : 'success', title : 'Success', message : '</br>Un-Banned User!'});
				   setTimeout(location.reload.bind(location), 1000);
  	          }
  	    });
	}
	</script>