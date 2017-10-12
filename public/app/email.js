$(function(){
	$(".menu_account").addClass("active");

	$('#email_form').submit(function(event){

        $('html').block({
            message: '<span class="text-white"><i class="icon-spinner10 spinner"></i> Updating Email..</span>',
            overlayCSS: {backgroundColor:'#000',opacity:0.8},
            css: {border:0,padding:0,backgroundColor:'none'}
        });

        $.ajax({
            url: $('#email_form').attr('action'),
            type: 'POST',
            data: $('#email_form').serialize(),

            success: function(response)
            {
                if (response.status == "success")
                {
                    new PNotify({
                        title: 'Success',
                        text: 'Your email has been changed successfully.',
                        addclass: 'bg-success'
                    });

                    $("#current_email").html($('[type=email]').val());
                    $("#email_form")[0].reset();
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
