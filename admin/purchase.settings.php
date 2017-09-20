<?php
	$PG = $_GET['p']; 
	$PageTitle = explode(".", $PG)[0];
?>
	
	<section class="content-header">
      <h1>Purchase Settings</h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php"><i class="fa fa-cog"></i> Admin</a></li>
        <li class="active"> Purchase Settings</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="col-md-12">
		<center>
		
		</center>
	</div>
	<div class="col-md-13">
          <div class="box box-solid box-<?php echo $theme2; ?>">
            <div class="box-header with-border">
			  <div class="pull-right box-title">
				<span class="label label-warning"><h3 class="box-title"><?php echo $PG; ?></h3></span>
				<a href="index.php" class="btn btn-default btn-sm"><i class="fa fa-backward"></i> Back</a>
			  </div>
              <h2 class="box-title">Purchase Settings</h2>
            </div>
            <div class="box-body">
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input onChange="SHIT()" id="DisablePurchases" name="DisablePurchases" type="checkbox" <?php echo (($DB->GetSettings("Value", "2") == "1") ? "checked" : ""); ?>>
                      Disable Purchases
                    </label>
                  </div>
                </div>
				<div class="form-group">
                    <label for="PPEMAIL">Paypal Email:</label>
                      <input class="form-control" onChange="SHIT2()" id="PPEMAIL" name="PPEMAIL" type="text" value="<?php echo $DB->GetSettings("Value", "3"); ?>">
                </div>
            </div>
          </div>
        </div>
		<script>
	$("#PPEMAIL").keyup(function(event){
        if(event.keyCode == 13){
            SHIT();
        }
    });
		   function SHIT() {
			if( document.getElementById("DisablePurchases").checked == true) {
       			$.ajax({
			    	type: "POST",
					url: "../plugins/ADMIN/Purchases.php",
					data: "val=1" ,
					success: function(html) {
                   $.toaster({ priority : 'success', title : 'Success', message : '</br>Purchasing Enabled!'});
				   setTimeout(location.reload.bind(location), 1000);
					}
				});
    		} else {
        		$.ajax({
			    	type: "POST",
					url: "../plugins/ADMIN/Purchases.php",
					data: "val=0" ,
					success: function(html) {
                   $.toaster({ priority : 'success', title : 'Success', message : '</br>Purchasing Disabled!'});
				   setTimeout(location.reload.bind(location), 1000);
					}
				});
    		}
		   }
		   function SHIT2() {
			$.ajax({
			    	type: "POST",
					url: "../plugins/ADMIN/Purchases.php",
					data: "email="+document.getElementById("PPEMAIL").value,
					success: function(html) {
                   $.toaster({ priority : 'success', title : 'Success', message : '</br>Paypal Email Updated!'});
				   setTimeout(location.reload.bind(location), 1000);
					}
				});
		   }
		</script>