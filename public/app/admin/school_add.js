$(function() {
	$(".menu_school_add").addClass("active");
});

$(document).ready(function(){

    $('#add_school_form').submit(function(event){

        $('html').block({
            message: '<i class="icon-spinner2 spinner"></i><br> Logging in ..',
            overlayCSS: {backgroundColor:'#fff',opacity:0.8,cursor:'wait'},
            css: {border:0,padding:0,backgroundColor:'none'}
        });

        $.ajax({
            url: $('#add_school_form').attr('action'),
            type: 'POST',
            data: $('#add_school_form').serialize(),

            success: function(response)
            {
                if (response.status == "success")
                {
                    window.location.reload();
                }
                else
                {
                    new PNotify({
                        title: 'Error',
                        text: 'There was an error while adding school.',
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
