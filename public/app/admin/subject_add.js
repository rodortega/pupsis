$(document).ready(function(){

    $('#add_subject_form').submit(function(event){

        $('html').block({
            message: '<span class="text-white"><i class="icon-spinner10 spinner"></i> Adding Subject</span>',
            overlayCSS: {backgroundColor:'#000',opacity:0.8},
            css: {border:0,padding:0,backgroundColor:'none'}
        });

        $.ajax({
            url: $('#add_subject_form').attr('action'),
            type: 'POST',
            data: $('#add_subject_form').serialize(),

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
