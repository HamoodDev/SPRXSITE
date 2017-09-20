	function CreateBug() {
		var bugtitle = $('#bugtitle').val();
		var bugtext = $('#bugtext').val();
		$.ajax({
			type: "POST",
			url: "plugins/Bugs/CreateBug.php",
			data: "bugtitle=" + bugtitle + "&bugtext=" + bugtext ,
			success: function(html) {
                   $.toaster({ priority : 'success', title : 'Success!', message : '<br>Bug Created!'});
				   setTimeout(location.reload.bind(location), 1000);
			}
		});
  	}