
	function EditUserProfile() {
		var clientmsg1 = $("#inputName").val();
		var clientmsg2 = $("#inputEmail").val();
	    var inputRank = document.getElementById("themeid");
		var theme = inputRank.options[inputRank.selectedIndex].value;
		if(clientmsg1 == "" || clientmsg2 == ""){
                   $.toaster({ priority : 'error', title : 'Error', message : '\nCannot Username Or Email Be Empty!'});
				   //setTimeout(location.reload.bind(location), 1000);
		}
		else {
			$.ajax({
				type: "POST",
				url: "plugins/Profile/edit.php",
				data: "name="+clientmsg1+"&email="+clientmsg2+"&theme="+theme,
				success: function(response) {
                   $.toaster({ priority : 'success', title : 'Success', message : '\nProfile Updated!'});
				   //setTimeout(location.reload.bind(location), 1000);
				   console.log(response);
				}
			});
		}
  	}