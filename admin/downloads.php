<section class="content-header">
      <h1>
        Downloads
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php"><i class="fa fa-cog"></i> Admin</a></li>
        <li class="active">Downloads</li>
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
              <h2 class="box-title">Admin > <?php echo $PageTitle; ?></h2>
            </div>
            <div class="box-body">
		        <div class="col-md-13">
                    <div class="box box-solid box-<?php echo $theme2; ?>">
            <div class="box-header with-border">
              <h3 class="box-title">Upload New File</h3>
            </div>
              <div class="box-body">
			  <form enctype="multipart/form-data" action="../plugins/Downloads/UploadFile.php" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail1">Version:</label>
                  <input type="text" class="form-control" id="vr" name="vr" placeholder="Enter Version Number">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File:</label>
                  <input type="file" id="exampleInputFile" name="exampleInputFile" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Change Log:</label>
                  <textarea type="text" class="form-control" id="changelog" name="changelog" placeholder="Enter File Changelog"></textarea>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" id="upload-button" onclick="UploadFile()" class="btn btn-<?php echo $theme2; ?> btn-block">Submit</button>
              </div>
			  </form>
          </div>
  	            </div>
            </div>
		  </div>
        </div>
<script>
	function UploadFile() {
		var VR = $('#version').val();
		var exampleInputFile = document.getElementById("exampleInputFile");
  		var chatInput = id;
		$.ajax({
			type: "POST",
			url: "../plugins/Downloads/UploadFile.php",
			data: "vr=" + VR+"&file="+exampleInputFile ,
			success: function(html) {
				location.reload();
			}
		});
  	}
</script>