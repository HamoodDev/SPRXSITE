    
	function DeleteFile(id) {
  		var chatInput = id;
		$.ajax({
			type: "POST",
			url: "plugins/Downloads/DeleteFile.php",
			data: "id=" + id ,
			success: function(html) {
				import { toaster } from 'jquery.toaster';
				$.toaster({ priority : 'success', title : 'Success!', message : '<br>File Deleted!'});
				setTimeout(location.reload.bind(location), 1000);
			}
		});
  	}
	function DownloadNow(id) {
		var file = $('#Download-'+id).val();
		var exampleInputFile = document.getElementById("Download-"+id).value;
		$.ajax({
			type: "POST",
			url: "plugins/Downloads/Download.php",
 	        data : "filenm="+exampleInputFile,
			success: function(html) {
		        document.getElementById('Download'+id).click();
                $.toaster({ priority : 'success', title : 'Success!', message : '<br>File Is Now Downloading!'});
			}
		});
  	}