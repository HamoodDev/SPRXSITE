	$("#key").keyup(function(event){
        if(event.keyCode == 13){
            $("#LoginY").click();
        }
    });
	function Login() {
		var me = $("#key").val();
		var msg = "";
		$.ajax({
			type: "POST",
			url: "plugins/ADMIN/GetValue.php",
			data: "id=1",
			success: function(html) {
				msg = html;
			}
		});
		$.ajax({
			type: "POST",
			url: "plugins/Login/Login.php",
			data: "key=" + me ,
			success: function(html) {
				if(html == "Logged In.") {
                   $.toaster({ priority : 'success', title : 'Success', message : '<br/>Successfully logged in!<br/>Redicting...'});
				   setTimeout(location.reload.bind(location), 1000);
				}
				else {
                   $.toaster({ priority : 'error', title : 'Error', message : '<br/>' + html});
				}
			}
		});
  	}