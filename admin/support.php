<?php 
		  $PG = $_GET['p']; 
		  $PageTitle = explode(".", $PG)[0];
		?>
		<section class="content-header">
      		<h1>Support Tickets</h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php"><i class="fa fa-cog"></i> Admin</a></li>
        <li class="active">Support Tickets</li>
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
              <h2 class="box-title">View All Support Tickets</h2>
            </div>
            <div class="box-body">
                  <div id='example2_wrapper' class='dataTables_wrapper form-inline dt-bootstrap'><div class='row'><div class='col-sm-6'>
			  </div>
			  <div class='col-sm-6'></div></div><div class='row'>
			  <div class='col-sm-12'>
			  <table id='example2' class='table table-bordered table-hover dataTable' role='grid' aria-describedby='example2_info'>
                <thead>
                <tr role='row'>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>ID</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Creator</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Title</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Date</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Actions</th>
				</tr>
                </thead>
                <tbody>
			<?php
			$DB->db_connect();
			$stmt = $DB->DB->prepare("SELECT * FROM `supporttickets` ORDER BY id DESC");
    		$ok = $stmt->execute();
			$result = $stmt -> fetchAll();
			foreach( $result as $rows ) {
				echo "
                <tr role='row' class='even'>
                  <td class='sorting_1'>". $rows['id'] ."</td>
                  <td>". $rows['By'] ."</td>
                  <td>". $rows['Title'] ."</td>
                  <td>". date("Y/m/d H:i a", strtotime($rows['DateTime'])) ."</td>
                  <td><a href='index.php?p=viewticket.php?id=".$rows['id']."' class='text-link'><i class='fa fa-eye'></i> View</a> - <span onClick='". (($rows['status'] == 'Active') ? 'MarkSolved()' : 'MarkActive()')."' style='color:". (($rows['status'] == 'Active') ? 'green' : 'red')."' class='five'>Mark ". (($rows['status'] == 'Active') ? 'Solved' : 'Active')."</span></td>
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
<script>
   function MarkSolved(ID){
		$.ajax ({
  		      url: "../plugins/Tickets/MarkSolved.php",
  	          type : "POST",
  	          cache : false,
 	          data : "id="+ID,
  	          success: function(response)
  	          {
		           location.reload();
  	          }
  	    });
   }
   function MarkActive(ID){
		$.ajax ({
  		      url: "../plugins/Tickets/MarkActive.php",
  	          type : "POST",
  	          cache : false,
 	          data : "id="+ID,
  	          success: function(response)
  	          {
		           location.reload();
  	          }
  	    });
   }
</script>