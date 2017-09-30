$(function(){
	$(".menu_student").addClass("active");

	$("#view_button").click(function(event) {

    	$('html').block({
            message: '<span class="text-white"><i class="icon-spinner10 spinner"></i> Loading Schedule ..</span>',
            overlayCSS: {backgroundColor:'#000',opacity:0.8},
            css: {border:0,padding:0,backgroundColor:'none'}
    	});

    	$.ajax({
	        url: url + "student/search",
	        type: 'POST',
	        data: {"class_id" : $("#class_id").val()},

	        success: function(response)
	        {
	        	var i,j,button;

	        	if (response.status == "success")
	        	{
	        		$("#data_student").html('');

	        		for (i = 0; i < response.message.length; i++)
	        		{
	        			if (response.is_encoding == 1)
		        		{
		        			button = '<button class="btn btn-xs btn-primary" id="'+response.message[i].id+'" onClick="encodeGrade(this.id)"><i class="icon-pencil position-left"></i>ENCODE</button>';
		        		}
		        		else
		        		{
		        			button = '<button class="btn btn-xs btn-primary" disabled><i class="icon-pencil position-left"></i>ENCODE</button>';
		        		}

	        			var mark = response.message[i].mark;
	        			var grade = response.message[i].grade;
	        			var status = response.message[i].status;

	        			if (mark == null)
	        			{
	        				mark = '<span class="label label-danger">None</span>';
	        			}
	        			if (grade == null)
	        			{
	        				grade = '<span class="label label-danger">None</span>';
	        			}
	        			if (status == 1)
	        			{
	        				status = '<span class="label label-info">ONGOING</span>';
	        			}
	        			if (status == 2)
	        			{
	        				status = '<span class="label label-success">PASSED</span>';
	        			}

	        			j +='<tr id="class_'+response.message[i].id+'">' +
	        					'<td>' + response.message[i].user_code + '</td>' +
	        					'<td>' + response.message[i].firstname + ' ' + response.message[i].lastname + '</td>' +
	        					'<td>' + mark + '</td>' +
	        					'<td>' + grade + '</td>' +
	        					'<td>' + status + '</td>' +
	        					'<td>' + button + '</td>' +
	        				'</tr>';
	        		}

	        		$("#data_student").append(j);
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
    });
});

function encodeGrade(id){

	$('html').block({
            message: '<span class="text-white"><i class="icon-spinner10 spinner"></i> Loading Schedule ..</span>',
            overlayCSS: {backgroundColor:'#000',opacity:0.8},
            css: {border:0,padding:0,backgroundColor:'none'}
    	});

    	$.ajax({
	        url: url + "schedule/grade",
	        type: 'POST',
	        data: {"schedule_id" : id},

	        success: function(response)
	        {
	        	if (response.status == "success")
	        	{
	        		$("#modal_data").html('');

	        		var j = '<br><h5>'+response.message.firstname+ ' ' +response.message.middlename+ ' '+response.message.lastname+'</h5>';
	        		j += '<p><b>'+response.message.code+'</b> '+response.message.name+'</p>';

	        		$("#modal_data").prepend(j);
	        		$("#modal_grade").modal('show');
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
}