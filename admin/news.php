<section class="content-header">
      <h1>
        Website News
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php"><i class="fa fa-cog"></i> Admin</a></li>
        <li class="active">Website News</li>
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
              <h2 class="box-title">Admin > News</h2>
            </div>
            <div class="box-body">
			    <div class="col-md-13">
          <div class="nav-tabs-<?php echo $theme2; ?>">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Create New NewsLetter</a></li>
              <li><a href="#tab_2" data-toggle="tab">Created News (OLD)</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
			    <div class="col-md-12">
			        <div class="form-group">
                      <label for="newssex1">News Title:</label>
                      <input type="text" class="form-control" id="newssex1" placeholder="Enter News Title">
                    </div>
                    <div class="form-group">
                      <label for="newssex2">News Text:</label>
                      <textarea type="text" rows="5" placeholder="Enter News Text" id="newssex2" class="form-control"></textarea>
					</div>
					<div class="pull-right">
					    <button onclick="CreateNews()" class="btn btn-<?php echo $theme2; ?>">Submit News</button>
					</div>
				</div>
              </div>
              <div class="tab-pane" id="tab_2">
			    <table id='example2' class='table table-bordered table-hover dataTable' role='grid' aria-describedby='example2_info'>
                <thead>
                <tr role='row'>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>ID</th>
				<th class='sorting_asc' tabindex='0' aria-controls='example2' rowspan='1' colspan='1' aria-sort='ascending'>Author</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Title</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Text</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Date</th>
				<th>Actions</th>
				</tr>
                </thead>
                <tbody>
			    <?php
			        $DB->db_connect();
					$stmt = $DB->DB->prepare("SELECT * FROM `news` ORDER BY `id` DESC");
    				$ok = $stmt->execute();
					$result = $stmt -> fetchAll();
					foreach( $result as $rows ) {
						echo "
                		    <tr role='row' class='even'>
                		        <td class='sorting_1'>". $rows['id'] ."</td>
                		        <td class='sorting_1'>". $rows['Poster'] ."</td>
                		        <td>". $rows['Title'] ."</td>
                		        <td>". $rows['Text'] ."</td>
                		        <td>". $MAIN->time_elapsed_string($rows['DateTime']) ."</td>
                		        <td><span onClick='DeleteUser(". $rows['id'] .")' class='text-danger fa fa-remove'></span> <a href='index.php?p=edituser.php?id=". $rows['id'] ."'><span class='fa fa-edit'></span></a></td>
                            </tr>";
			        }
			    ?>
				</tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
            </div>
		  </div>
        </div>
		<script>
		function CreateNews(){
	    var newstitle = document.getElementById("newssex1").value;
	    var newstext = document.getElementById("newssex2").value;
		$.ajax ({
  		      url: "../plugins/ADMIN/CreateNews.php",
  	          type : "POST",
			  data : "newstitle="+newstitle+"&newstext="+newstext,
  	          cache : false,
  	          success: function(response)
  	          {
                   $.toaster({ priority : 'success', title : 'Success', message : '</br>News Created!'});
				   setTimeout(location.reload.bind(location), 1000);
  	          }
  	    });
	}
		</script>