$(document).ready(function(){

    $('#registrar_form').submit(function(event){

    	$('html').block({
            message: '<i class="icon-spinner2 spinner"></i><br><br> Saving info ..',
            overlayCSS: {backgroundColor:'#fff',opacity:0.8,cursor:'wait'},
            css: {border:0,padding:0,backgroundColor:'none'}
        });

        $.ajax({
	        url: $('#registrar_form').attr('action'),
	        type: 'POST',
	        data: $('#registrar_form').serialize(),

	        success: function(response)
	        {
	        	if (response.status == "success")
	        	{
	        		new PNotify({
			            title: 'Saving Successful.',
			            text: 'Registrar has been updated.',
			            addclass: 'bg-success'
			        });
	        	}
	        	else
	        	{
	        		new PNotify({
			            title: 'Error',
			            text: 'There might be an error on your input. Please check again.',
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