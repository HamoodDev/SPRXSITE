	$(document).ready(function () {
    	setInterval(function () {
       	 	updateChat();
   		}, 6000);
	});
    function post(){	
		var clientmsg = $("#usermsg").val();
		$.ajax ({
  		      url: "plugins/chat/post.php",
  	          type : "POST",
  	          cache : false,
 	          data : "teest="+clientmsg,
  	          success: function(response)
  	          {
				  document.getElementById('usermsg').value='';
				  updateChat();
  	          }
  	    });
	}
	function updateChat() {
		$.ajax({
			type: "GET",
			url: "plugins/chat/GetChat.php",
			success: function(html) {
			    $("#chatbox").html(html);
			}
		});
    };
	function DeleteMessage(id) {
  		var chatInput = id;
		$.ajax({
			type: "POST",
			url: "plugins/chat/DeleteMessage.php",
			data: "id=" + id ,
			success: function(html) {
				updateChat();
			}
		});
  	}
	$("#usermsg").keyup(function(event){
        if(event.keyCode == 13){
            $("#submitmsg").click();
        }
    });
	function EditMessage(id) {
		var clientmsg = $("#myedit"+id).val();
		$.ajax({
			type: "POST",
			url: "plugins/chat/EditMessage.php",
			data: "id="+id+"&textt="+clientmsg,
			success: function(html) {
			    updateChat();
			}
		});
    };