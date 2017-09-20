    function Update() {
	    var username = $("#username").val();
	    var email = $("#email").val();
		$.ajax({
			type: "POST",
			url: "plugins/Login/Update.php",
			data: "username="+username+"&email="+email,
			success: function(html) {
				$.toaster({ priority : 'success', title : 'Success', message : '<br/>Successfuly Updated Profile!'})
			}
		});
	}