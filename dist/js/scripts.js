    /***********************************************************************************
* Add Array.indexOf                                                                *
***********************************************************************************/
(function ()
{
	if (typeof Array.prototype.indexOf !== 'function')
	{
		Array.prototype.indexOf = function(searchElement, fromIndex)
		{
			for (var i = (fromIndex || 0), j = this.length; i < j; i += 1)
			{
				if ((searchElement === undefined) || (searchElement === null))
				{
					if (this[i] === searchElement)
					{
						return i;
					}
				}
				else if (this[i] === searchElement)
				{
					return i;
				}
			}
			return -1;
		};
	}
})();
/**********************************************************************************/

(function ($,undefined)
{
	var toasting =
	{
		gettoaster : function ()
		{
			var toaster = $('#' + settings.toaster.id);

			if(toaster.length < 1)
			{
				toaster = $(settings.toaster.template).attr('id', settings.toaster.id).css(settings.toaster.css).addClass(settings.toaster['class']);

				if ((settings.stylesheet) && (!$("link[href=" + settings.stylesheet + "]").length))
				{
					$('head').appendTo('<link rel="stylesheet" href="' + settings.stylesheet + '">');
				}

				$(settings.toaster.container).append(toaster);
			}

			return toaster;
		},

		notify : function (title, message, priority)
		{
			var $toaster = this.gettoaster();
			var $toast  = $(settings.toast.template.replace('%priority%', priority)).hide().css(settings.toast.css).addClass(settings.toast['class']);

			$('.title', $toast).css(settings.toast.csst).html(title);
			$('.message', $toast).css(settings.toast.cssm).html(message);

			if ((settings.debug) && (window.console))
			{
				console.log(toast);
			}

			$toaster.append(settings.toast.display($toast));

			if (settings.donotdismiss.indexOf(priority) === -1)
			{
				var timeout = (typeof settings.timeout === 'number') ? settings.timeout : ((typeof settings.timeout === 'object') && (priority in settings.timeout)) ? settings.timeout[priority] : 1500;
				setTimeout(function()
				{
					settings.toast.remove($toast, function()
					{
						$toast.remove();
					});
				}, timeout);
			}
		}
	};

	var defaults =
	{
		'toaster'         :
		{
			'id'        : 'toaster',
			'container' : 'body',
			'template'  : '<div></div>',
			'class'     : 'toaster',
			'css'       :
			{
				'position' : 'fixed',
				'top'      : '10px',
				'right'    : '10px',
				'width'    : '300px',
				'zIndex'   : 50000
			}
		},

		'toast'       :
		{
			'template' :
			'<div class="alert alert-%priority% alert-dismissible" role="alert">' +
				'<button type="button" class="close" data-dismiss="alert">' +
					'<span aria-hidden="true">&times;</span>' +
					'<span class="sr-only">Close</span>' +
				'</button>' +
				'<span class="title"></span>: <span class="message"></span>' +
			'</div>',

			'css'      : {},
			'cssm'     : {},
			'csst'     : { 'fontWeight' : 'bold' },

			'fade'     : 'slow',

			'display'    : function ($toast)
			{
				return $toast.fadeIn(settings.toast.fade);
			},

			'remove'     : function ($toast, callback)
			{
				return $toast.animate(
					{
						opacity : '0',
						padding : '0px',
						margin  : '0px',
						height  : '0px'
					},
					{
						duration : settings.toast.fade,
						complete : callback
					}
				);
			}
		},

		'debug'        : false,
		'timeout'      : 1500,
		'stylesheet'   : null,
		'donotdismiss' : []
	};

	var settings = {};
	$.extend(settings, defaults);

	$.toaster = function (options)
	{
		if (typeof options === 'object')
		{
			if ('settings' in options)
			{
				settings = $.extend(settings, options.settings);
			}

			var title    = ('title' in options) ? options.title : 'Notice';
			var message  = ('message' in options) ? options.message : null;
			var priority = ('priority' in options) ? options.priority : 'success';

			if (message !== null)
			{
				toasting.notify(title, message, priority);
			}
		}
	};

	$.toaster.reset = function ()
	{
		settings = {};
		$.extend(settings, defaults);
	};
})(jQuery);











	
	
	
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
	
	function CreateTicket() {
		var VR1 = $('#tickett1').val();
		var VR2 = $('#tickett2').val();
		$.ajax({
			type: "POST",
			url: "plugins/Tickets/CreateTicket.php",
			data: "tickett1=" + VR1 + "&tickett2=" + VR2 ,
			success: function(html) {
                   $.toaster({ priority : 'success', title : 'Success!', message : '<br>Ticket Created!'});
				   setTimeout(location.reload.bind(location), 1000);
			}
		});
  	}
	$("#usermsgtkt2").keyup(function(event){
        if(event.keyCode == 13){
            $("#subm").click();
        }
    });
	function postTicket(){	
		var clientmsg = $("#usermsgtkt2").val();
		var ID = $("#idd").val();
		$.ajax ({
  		      url: "plugins/Tickets/post.php",
  	          type : "POST",
  	          cache : false,
 	          data : "ID2="+clientmsg+"&id="+ID+"&type=client",
  	          success: function(response)
  	          {
		          location.reload();
  	          }
  	    });
	}
	
	function pPost() {
		var clientmsg = $("#mind").val();
		if(clientmsg == ""){
                   $.toaster({ priority : 'error', title : 'Error!', message : '<br>You Must Type Something!'});
				   setTimeout(location.reload.bind(location), 1000);
		}
		else {
		$.ajax ({
  		      url: "plugins/Profile/post.php",
  	          type : "POST",
  	          cache : false,
 	          data : "mind="+clientmsg,
  	          success: function(response)
  	          {
                   $.toaster({ priority : 'success', title : 'Success!', message : '<br>Post Created!'});
				   setTimeout(location.reload.bind(location), 1000);
  	          }
  	    });
		}
	}
	function EditUserProfile() {
		var clientmsg1 = $("#inputName").val();
		var clientmsg2 = $("#inputEmail").val();
	    var inputRank = document.getElementById("themeid");
		var theme = inputRank.options[inputRank.selectedIndex].value;
		if(clientmsg1 == "" || clientmsg2 == ""){
			alert("Error:\n  Fill All Fields.");
		}
		else {
			$.ajax({
				type: "POST",
				url: "plugins/Profile/edit.php",
				data: "name="+clientmsg1+"&email="+clientmsg2+"&theme="+theme,
				success: function(response) {
                   $.toaster({ priority : 'success', title : 'Success!', message : '<br>Profile Saved!'});
				   setTimeout(location.reload.bind(location), 1000);
				}
			});
		}
  	}
	
		$("#key").keyup(function(event){
        if(event.keyCode == 13){
            $("#LoginY").click();
        }
    });
	function Login() {
        $.toaster({ priority : 'info', title : 'Please Hold!', message : '<br>We Are Logging You In.'});
		var me = $("#key").val();
		$.ajax({
			type: "POST",
			url: "plugins/Login/Login.php",
			data: "key=" + me ,
			success: function(html) {
				if(html == "Logged In.") {
                   $.toaster({ priority : 'success', title : 'Success!', message : '<br>Logged In!'});
				   setTimeout(location.reload.bind(location), 1000);
				}
				else {
					alert(html);
				}
		        document.getElementById("LoginY").value="Sign In";
			}
		});
  	}
	
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
	
	
	