	function CreateSuggestion() {
		var suggestiontitle = $('#suggestiontitle').val();
		var suggestiontext = $('#suggestiontext').val();
		$.ajax({
			type: "POST",
			url: "plugins/Suggestions/CreateSuggestion.php",
			data: "suggestiontitle=" + suggestiontitle + "&suggestiontext=" + suggestiontext ,
			success: function(html) {
                   $.toaster({ priority : 'success', title : 'Success!', message : '\nSuggestion Added!'});
				   setTimeout(location.reload.bind(location), 1000);
			}
		});
  	}