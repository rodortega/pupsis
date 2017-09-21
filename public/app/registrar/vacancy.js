$(function(){
	$(".menu_vacancy").addClass("active");

	$('.schedule').fullCalendar({
        header: false,
        firstDay: 1,
        defaultView: 'agendaWeek',
        allDaySlot: false,
        defaultDate: '2017-01-02',
        eventStartEditable: true,
        minTime: "07:00:00",
  		maxTime: "23:00:00",
  		contentHeight: 690,
        eventOverlap: false,
        columnFormat: 'dddd',
        eventDrop: function (event, dayDelta, minuteDelta) {

        	$('html').block({
	            message: '<span class="text-white"><i class="icon-spinner10 spinner"></i> Saving info ..</span>',
	            overlayCSS: {backgroundColor:'#000',opacity:0.8},
	            css: {border:0,padding:0,backgroundColor:'none'}
        	});

        	var start = event.start.format('HH:mm:ss');
    		var end = event.end.format('HH:mm:ss');
    		var week = event.start.format('dddd');

	        $.ajax({
		        url: url + "vacancy/edit",
		        type: 'POST',
		        data: {"id" : event.id, "time_start" : start, "time_end" : end, "week" : week},

		        success: function(response)
		        {
		        	if (response.status == "success")
		        	{
		        		new PNotify({
				            title: 'Saving Successful.',
				            text: 'Schedule has been updated.',
				            addclass: 'bg-success'
				        });
		        	}
		        	else
		        	{
		        		new PNotify({
				            title: 'Error',
				            text: 'The room schedule cannot be updated.',
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
    });

    $("#view_button").click(function(event) {

    	$('html').block({
            message: '<span class="text-white"><i class="icon-spinner10 spinner"></i> Loading Schedule ..</span>',
            overlayCSS: {backgroundColor:'#000',opacity:0.8},
            css: {border:0,padding:0,backgroundColor:'none'}
    	});

    	$(".schedule").fullCalendar('removeEvents');

    	$.ajax({
	        url: url + "vacancy/search",
	        type: 'POST',
	        data: {"room_id" : $("#room_id").val()},

	        success: function(response)
	        {
	        	var events = [];
                $.each(response,function(index,value){
                    events.push({
                    	id : value.id,
                        title : value.title,
                        start : value.start,
                        end : value.end,
                        color: value.color
                    });
                });
                $('.schedule').fullCalendar( 'addEventSource', events);
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
