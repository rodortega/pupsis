$(function(){
	$('[name="user_code"]').formatter({
	    pattern: '{{9999}}-{{99999}}-{{aa}}-{{9}}'
	});
	$('[name="birthdate"]').formatter({
	    pattern: '{{9999}}-{{99}}-{{99}}'
	});
});

$(document).ready(function(){

    $('#login_form').submit(function(event){

    	$('html').block({
            message: '<span class="text-white"><i class="icon-spinner10 spinner"></i> Logging in..</span>',
            overlayCSS: {backgroundColor:'#000',opacity:0.8},
            css: {border:0,padding:0,backgroundColor:'none'}
        });

        $.ajax({
	        url: $('#login_form').attr('action'),
	        type: 'POST',
	        data: $('#login_form').serialize(),

	        success: function(response)
	        {
	        	if (response.status == "success")
	        	{
	        		window.location.href = url + "registrar/dashboard";
	        	}
	        	else
	        	{
	        		new PNotify({
			            title: 'Login Error',
			            text: response.message,
			            addclass: 'bg-danger'
			        });
	        	}
	        },
	        error: function()
	        {
	        	new PNotify({
		            title: 'Server Error',
		            text: 'Please contact your administrator',
		            addclass: 'bg-danger'
		        });
	        },
	        complete: function()
	        {
	        	$('html').unblock();
	        }
    	});
    	event.preventDefault();
	});
});