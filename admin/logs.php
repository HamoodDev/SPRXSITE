
    <section class="content-header">
      <h1>
        Admin - Logs
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin - Logs</li>
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
              <h3 class="box-title">[<b><?php echo $DB->SelectAllCount("logs"); ?></b>] Total Logs</h3>
			  <div class="box-tools">
			      <button onclick="ClearLogs()" class="btn bg-<?php echo $theme2; ?> margin btn-xs">Clear Logs</button>
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
			$stmt = $DB->DB->prepare("SELECT * FROM `logs` WHERE `type` = 'log'");
    		$ok = $stmt->execute();
			$result = $stmt -> fetchAll();
			foreach( $result as $rows ) {
				echo "
                <tr role='row' class='even'>
                  <td class='sorting_1'>". $rows['username'] ."</td>
                  <td>";
				  $MSG = $rows['action'];
				  if ((strpos($MSG, "&^&") !== false)){
				    $MSG = str_replace ("&^&", "'" , $MSG );
			      }
				  echo "$MSG";
				echo "</td>
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
  </div>
    </section>
  
<script>
  function ClearLogs(){
		$.ajax({
			type: "POST",
			cashe: false,
			url: "../plugins/ADMIN/logs/CLEAR.php",
			success: function(html) {
                   $.toaster({ priority : 'success', title : 'Success', message : '</br>Log Cleared.'});
				   setTimeout(location.reload.bind(location), 1000);
			}
		});
  }
</script>