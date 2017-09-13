$(document).ready(function(){

    $('#login_form').submit(function(event){

    	$('html').block({
            message: '<i class="icon-spinner2 spinner"></i><br> Logging in ..',
            overlayCSS: {backgroundColor:'#fff',opacity:0.8,cursor:'wait'},
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
	        		window.location.href = url + "admin/dashboard";
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