        <section class="content-header">
      <h1>
        Ad Manager
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo SiteURL; ?>/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php"><i class="fa fa-cog"></i> Admin</a></li>
        <li class="active">Ad Manager</li>
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
              <h2 class="box-title">Ad Manager</h2>
            </div>
            <div class='box-body'>
              <div class="box-body">
                <div class="form-group">
                  <label for="IMGURL">Image URL:</label>
                  <input type="text" class="form-control" id="IMGURL" placeholder="<?php echo SiteURL; ?>/uploads/example.png">
                </div>
                <div class="form-group">
                  <label for="WebsiteURL">Website URL:</label>
                  <input type="text" class="form-control" id="WebsiteURL" placeholder="<?php echo SiteURL; ?>/">
                </div>
              </div>
              <div class="box-footer">
                <button onclick="CreateAd()" class="btn btn-<?php echo $theme2; ?> btn-block">Create Ad</button>
              </div>
                    </div>
		  </div>
        </div>