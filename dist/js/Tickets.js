	function CreateTicket() {
		var VR1 = $('#tickett1').val();
		var VR2 = $('#tickett2').val();
		$.ajax({
			type: "POST",
			url: "plugins/Tickets/CreateTicket.php",
			data: "tickett1=" + VR1 + "&tickett2=" + VR2 ,
			success: function(html) {
                   $.toaster({ priority : 'success', title : 'Success', message : '\nTicket Created!'});
				   setTimeout(location.reload.bind(location), 1000);
			}
		});
  	}
	$("#usermsg").keyup(function(event){
        if(event.keyCode == 13){
            $("#submitmsg").click();
        }
    });
	function post(){	
		var clientmsg = $("#usermsg").val();
		var ID = $("#idd").val();
		$.ajax ({
  		      url: "plugins/Tickets/post.php",
  	          type : "POST",
  	          cache : false,
 	          data : "ID2="+clientmsg+"&id="+ID+"&type=client",
  	          success: function(response)
  	          {
                   $.toaster({ priority : 'success', title : 'Success', message : '\nComment Created!'});
				   setTimeout(location.reload.bind(location), 1000);
  	          }
  	    });
	}