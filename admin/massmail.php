<section class="content-header">
      <h1>
        Mail Users
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo SiteURL; ?>/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php"><i class="fa fa-cog"></i> Admin</a></li>
        <li class="active">Mass Mails</li>
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
              <h2 class="box-title">Mass Mail</h2>
            </div>
            <div class='box-body'>
              <div class="box-body">
                <div class="form-group">
                  <label for="EmailSubject">Email Subject:</label>
                  <input type="text" class="form-control" id="EmailSubject" placeholder="Enter Email Subject">
                </div>
                <div class="form-group">
                  <label for="EmailText">Email Text:</label>
                  <textarea type="text" class="form-control" id="EmailText" placeholder="Enter Email Text"></textarea>
                </div>
              </div>
              <div class="box-footer">
                <button onclick="MassMail()" class="btn btn-<?php echo $theme2; ?> btn-block">Send Email</button>
              </div>
                    </div>
		  </div>
        </div>
		<script>
		    function MassMail(){
	            var EmailSubject = document.getElementById("EmailSubject").value;
	            var EmailText = document.getElementById("EmailText").value;
			    $.ajax ({
  		            url: "<?php echo SiteURL; ?>/plugins/ADMIN/MASSMAIL.php",
  	                type : "POST",
					data : "subject="+EmailSubject+"&text="+EmailText,
  	                cache : false,
  	                success: function(response)
  	                {
		                location.reload();
  	                }
  	            });
		    }
		</script>