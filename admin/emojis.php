<section class="content-header">
      <h1>
        Customers
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php"><i class="fa fa-cog"></i> Admin</a></li>
        <li class="active">Customers</li>
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
              <h3 class="box-title">Create New Emoji</h3>
            </div>
            <div class="box-body">
			    <div class="form-group">
                    <label for="EmojiName">Emoji Name:</label>
                    <input type="EmojiName" class="form-control" id="EmojiName" placeholder="Enter Emoji Name">
                </div>
                <div class="form-group">
                    <label for="EmojiToReplace">Emoji To Replace:</label>
                    <input type="text" class="form-control" id="EmojiToReplace" placeholder="Enter Emoji To Replace example ( :p )">
                </div>
                <div class="form-group">
                    <label for="EmojiURL">Emoji Url:</label>
                    <input onchange="document.getElementById('imgsrc').src=this.value;" type="text" class="form-control" id="EmojiURL" placeholder="dist/img/Emojis/ (don't put ../ when adding only to test emoji) or http://blah.blah/img.png">
					<img id="imgsrc" src="" height="30" width="40"/>
                </div>
                <div class="form-group pull-right">
                    <button onClick="CreateEmoji()" class="btn btn-<?php echo $theme2; ?> btn-block">Create</button>
                </div>
            </div>
		</div>
		
          <div class="box box-solid box-<?php echo $theme2; ?>">
            <div class="box-header with-border">
              <h3 class="box-title">[<b><?php echo $DB->SelectAllCount("emojis"); ?></b>] Total Emojis</h3>
            </div>
            <div class="box-body">
			<div class='box'>
            <div class='box-body'>
              <div id='example2_wrapper' class='dataTables_wrapper form-inline dt-bootstrap'><div class='row'>
			  <div class='col-sm-12'>
			  <table id='example2' class='table table-bordered table-hover dataTable' role='grid' aria-describedby='example2_info'>
                <thead>
                <tr role='row'>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>ID</th>
				<th class='sorting_asc' tabindex='1' aria-controls='example2' rowspan='1' colspan='1' aria-sort='ascending'>Name</th>
				<th class='sorting' tabindex='2' aria-controls='example2' rowspan='1' colspan='1'>Emoji To Replace</th>
				<th class='sorting' tabindex='3' aria-controls='example2' rowspan='1' colspan='1'>Emoji URL</th>
				<th class='sorting' tabindex='3' aria-controls='example2' rowspan='1' colspan='1'>Emoji Image</th>
				<th class='sorting' tabindex='4' aria-controls='example2' rowspan='1' colspan='1'>Actions</th>
				</tr>
                </thead>
                <tbody>
			<?php
			    $DB->db_connect();
				$stmt = $DB->DB->prepare("SELECT * FROM `emojis` ORDER BY `id` ASC");
    			$ok = $stmt->execute();
				$result = $stmt -> fetchAll();
				foreach( $result as $rows ) {
					echo "
                		    <tr role='row' class='even'>
                		        <td class='sorting_1'>". $rows['id'] ."</td>
                		        <td class='sorting_1'>". $rows['Name'] ."</td>
                		        <td>". $rows['Wut'] ."</td>";
								$URL = $rows['url'];
								if (strpos($URL, 'dist') !== false) {
 								    echo "<td><img src='../".$rows['url']."' alt='confused face' class='icon_confused' height='20' width='20'/></td>";
								}
								else {
									echo "<td><img src='".$rows['url']."' alt='confused face' class='icon_confused' height='20' width='20'/></td>";
								}
                		        echo "
                		        <td>". $rows['url'] ."</td>
                		        <td><span onClick='DeleteEmoji(". $rows['id'] .")' class='text-danger fa fa-remove'></span></td>
                            </tr>";
			    }
			?>
				</tbody>
              </table></div></div>
            </div>
          </div>
          </div>
        </div>
		</div>
  </div>
            </div>
		  </div>
        </div>
	<script>
  function CreateEmoji(){
	  var IMGURL = document.getElementById("EmojiURL").value;
	  var IMGREPLACE = document.getElementById("EmojiToReplace").value;
	  var IMGNAME = document.getElementById("EmojiName").value;
		$.ajax ({
  		      url: "../plugins/ADMIN/CreateEmoji.php",
  	          type : "POST",
			  data : "IMGURL="+IMGURL+"&IMGREPLACE="+IMGREPLACE+"&IMGNAME="+IMGNAME+"&do=post",
  	          cache : false,
  	          success: function(response)
  	          {
                   $.toaster({ priority : 'success', title : 'Success!', message : '<br>Emoji Created'});
				   setTimeout(location.reload.bind(location), 1000);
  	          },
			  error: function(response) {
                   $.toaster({ priority : 'error', title : 'Error!', message : '<br>' + response});
              }
  	    });
	}
  function DeleteEmoji(id){
		$.ajax ({
  		      url: "../plugins/ADMIN/DeleteEmoji.php",
  	          type : "POST",
			  data : "id="+id+"&do=delete",
  	          cache : false,
  	          success: function(response)
  	          {
                   $.toaster({ priority : 'success', title : 'Success!', message : '<br>Emoji Deleted'});
				   setTimeout(location.reload.bind(location), 1000);
  	          },
			  error: function(response) {
                   $.toaster({ priority : 'error', title : 'Error!', message : '<br>' + response});
              }
  	    });
	}
	</script>