$(function(){

	$("#curriculum_form").submit(function(event){

		$('html').block({
            message: '<span class="text-white"><i class="icon-spinner10 spinner"></i> Checking room availability ..</span>',
            overlayCSS: {backgroundColor:'#000',opacity:0.8},
            css: {border:0,padding:0,backgroundColor:'none'}
        });

        $.ajax({
	        url: $('#curriculum_form').attr('action'),
	        type: 'POST',
	        data: $('#curriculum_form').serialize(),

	        success: function(response)
	        {
	        	var i,j;

	        	if (response.status == "success")
	        	{
	        		new PNotify({
			            title: 'Successful',
			            text: 'New Schedules is added.',
			            addclass: 'bg-success'
			        });
	        	}

	        	else if (response.status == "unavailable")
	        	{
	        		new PNotify({
			            title: 'Unavailable',
			            text: 'The room and time combination is not available.',
			            addclass: 'bg-warning'
			        });
	        	}

	        	else if (response.status == "error")
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
