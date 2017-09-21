$(document).ready(function(){
	$(".menu_student_add").addClass("active");

	$('[name="user_code"]').formatter({
	    pattern: '{{9999}}-{{99999}}-{{aa}}-{{9}}'
	});

    $('#student_form').submit(function(event){

    	$('html').block({
            message: '<span class="text-white"><i class="icon-spinner10 spinner"></i> Saving info..</span>',
            overlayCSS: {backgroundColor:'#000',opacity:0.8},
            css: {border:0,padding:0,backgroundColor:'none'}
        });
        $.ajax({
	        url: $('#student_form').attr('action'),
	        type: 'POST',
	        data: $('#student_form').serialize(),

	        success: function(response)
	        {
	        	if (response.status == "success")
	        	{
	        		new PNotify({
			            title: 'Saving Successful.',
			            text: 'Student has been added.',
			            addclass: 'bg-success'
			        });

			        $('#student_form').trigger("reset");
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