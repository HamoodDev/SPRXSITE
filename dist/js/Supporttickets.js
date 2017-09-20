function post(){	
		var clientmsg = $("#usermsg").val();
		var ID = $("#idd").val();
		document.getElementById("submitmsg").value = "Sending..";
		$.ajax ({
  		      url: "plugins/SupportTickets/post.php",
  	          type : "POST",
  	          cache : false,
 	          data : "teest="+clientmsg+"&id="+ID,
  	          success: function(response)
  	          {
		           location.reload();
  	          }
  	    });
	}