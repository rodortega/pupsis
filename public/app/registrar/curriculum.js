$(function(){
	$(".menu_curriculum").addClass("active");

	$('#class_form').submit(function(event){

    	$('html').block({
            message: '<span class="text-white"><i class="icon-spinner10 spinner"></i> Saving info..</span>',
            overlayCSS: {backgroundColor:'#000',opacity:0.8},
            css: {border:0,padding:0,backgroundColor:'none'}
        });

        $.ajax({
	        url: $('#class_form').attr('action'),
	        type: 'POST',
	        data: $('#class_form').serialize(),

	        success: function(response)
	        {
	        	var i,j;

	        	if (response.status == "success")
	        	{
	        		$("#data_schedule").html('');

	        		for (i = 0; i < response.message.length; i++)
	        		{
	        			j +='<tr>' +
	        					'<td>' + response.message[i].subject_code + '</td>' +
	        					'<td>' + response.message[i].firstname + ' ' + response.message[i].lastname + '</td>' +
	        					'<td>' + response.message[i].lec_count + '</td>' +
	        					'<td>' + response.message[i].lab_count + '</td>' +
	        					'<td>' + response.message[i].units + '</td>' +
	        					'<td>' + response.message[i].time_start + ' - ' + response.message[i].time_end +
	        					'<td>' + response.message[i].room_name + '</td>' +
	        				'</tr>';
	        		}
	        		//console.log(j);
	        		$("#data_schedule").append(j);
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
