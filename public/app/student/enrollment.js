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

	        	else if (response.status == "duplicate")
	        	{
	        		new PNotify({
			            title: 'Duplicate Error',
			            text: 'You have a duplicate subject in your schedule. Please choose the appropriate schedule and try again.',
			            addclass: 'bg-danger'
			        });
	        	}

	        	else if (response.status == "conflict")
	        	{
	        		new PNotify({
			            title: 'Conflict Error',
			            text: 'There is a conflict on your schedule. Either choose a different schedule or skip the subject with conflict schedule.',
			            addclass: 'bg-danger'
			        });
	        	}

	        	else
	        	{
	        		new PNotify({
			            title: 'Error',
			            text: 'Please contact your administrator',
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