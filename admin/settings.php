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
			    
            </div>
		  </div>
        </div>