$(function(){
	$(".menu_schedule").addClass("active");

	$('.schedule').fullCalendar({
        header: false,
        firstDay: 1,
        defaultView: 'agendaWeek',
        allDaySlot: false,
        defaultDate: '2017-01-02',
        eventStartEditable: false,
        minTime: "07:00:00",
  		maxTime: "23:00:00",
  		contentHeight: 690,
        eventOverlap: false,
        columnFormat: 'dddd'
    });

    getSchedule();
});

function getSchedule(){
    $.ajax({
        url: url + "schedule/search/student",
        type: 'POST',

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
        }
    });
}
