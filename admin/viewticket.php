<?php
	$PG = $_GET['p']; 
	$PageTitle = explode(".", $PG)[0];
    $_SESSION[SiteName]["reffer"] = $_SERVER['REQUEST_URI'];
	$_SESSION[SiteName]["customreffervalue"] = explode('php?id=', $_SERVER['REQUEST_URI'])[1];
	$ID2 = explode('php?id=', $_SERVER['REQUEST_URI']);
	$ID = $ID2[1];
?>
	
	<section class="content-header">
      <h1>Support Ticket #<?php echo $ID; ?></h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php"><i class="fa fa-cog"></i> Admin</a></li>
        <li><a href="index.php?p=support.php"><i class="fa fa-cog"></i> Support Tickets</a></li>
        <li class="active">Ticket #<?php echo $ID; ?></li>
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
              <h2 class="box-title">Support Ticket #<?php echo $ID; ?></h2>
            </div>
            <div class="box-body">
                <?php 
				echo "
			<div class='col-md-13'>
                <div class='box-body no-padding'>
              <div class='mailbox-read-info'>
                <h3>". $DB->GetTicket('Title', $ID)."</h3>
                <h5>From: <b>". $DB->GetTicket('By', $ID) ."</b>
                  <span class='mailbox-read-time pull-right'>". $DB->GetTicket('DateTime', $ID) ."</span></h5>
              </div>
              <div class='mailbox-read-message'>
                <p> ".emoticons($DB->GetTicket('Text', $ID)) ."</p>
				<input type='hidden' id='idd' name='idd' value='$ID'/>
              </div>
            </div>
		</div>
              <div class='direct-chat-messages' id='chatbox' name='chatbox'>";
			     $stmt = $DB->DB->prepare("SELECT * FROM `supportticketsreplies` WHERE `SID` = '$ID'");
    $ok = $stmt->execute();
	$result = $stmt -> fetchAll();
	foreach( $result as $row ) {
    	echo "<div class='direct-chat-msg'>
                  <img class='direct-chat-img' ";
				    $IMG = $USER->GetImgUrlGetImgUrl($row['From']);
				    if (strpos($IMG, 'https://') !== false) {
    			  		echo "src='". $USER->GetImgUrlGetImgUrl($row['From'])."'";
			        }
					else{
						echo "src='dist/img/users/" . $USER->GetImgUrlGetImgUrl($row['From'])."'";
					}
				  echo "' alt='Message User Image'>
                  <div class='direct-chat-text'>
                    <span class='direct-chat-name pull-left'>";
					echo" <b> ". $row['From'] ."</b> [". $row['MsgType'] ."] </span>: ". emoticons($row['Text']) ." <span class='direct-chat-timestamp pull-right'><b>". $MAIN->time_elapsed_string($row['DateTime']) ."</b></span>
                  </div>
                </div>";
	} ?>
              </div>
            </div>
            <div class="box-footer">
                <div class="input-group">
                    <input id="usermsg" name="usermsg" type="text" placeholder="Type Message ..." class="form-control">
                    <input id="pos" name="pos" type="hidden">
                      <span class="input-group-btn">
                        <button onclick="post(<?php echo $ID; ?>)" id="submitmsg" name="submitmsg" type="submit" class="btn btn-<?php echo $theme2; ?> btn-flat">Send</button>
                      </span>
                </div>
            </div>
          </div>
        </div>
					  <script>
		    			  function post(id) {
					  		var ID2 = $("#usermsg").val();
					  		$.ajax ({
  		      			  		url: "../plugins/Tickets/post.php",
  	         			  		type : "POST",
  	         			  		cache : false,
 	        			  		data : "id="+id + "&ID2=" + ID2+"&type=staff",
  	        			  		success: function(response)
  	        			  		{
		    			  		    location.reload();
  	       			  		    }
  	   			  		    });
  			  		 	}
			  		  </script>