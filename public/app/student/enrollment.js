$(function(){
	$(".menu_enrollment").addClass("active");

	$('.styled').uniform({
        wrapperClass: 'control-warning'
    });

    $('#schedule_form').submit(function(event){

    	$('html').block({
            message: '<span class="text-white"><i class="icon-spinner10 spinner"></i> Saving info..</span>',
            overlayCSS: {backgroundColor:'#000',opacity:0.8},
            css: {border:0,padding:0,backgroundColor:'none'}
        });

        $.ajax({
	        url: $('#schedule_form').attr('action'),
	        type: 'POST',
	        data: $('#schedule_form').serialize(),

	        success: function(response)
	        {
	        	if (response.status == "success")
	        	{
	        		window.location.href = url + 'student/schedule';
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