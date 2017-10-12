function addPrereq(subject_id){
    $("#input_subject_id").val(subject_id);
    $("#modal_prerequisite").modal('show');
}

$(document).ready(function(){

    $('#prerequisite_form').submit(function(event){

        $('#modal_prerequisite').block({
            message: '<span class="text-white"><i class="icon-spinner10 spinner"></i> Adding prerequisite..</span>',
            overlayCSS: {backgroundColor:'#000',opacity:0.8},
            css: {border:0,padding:0,backgroundColor:'none'}
        });

        $.ajax({
            url: $('#prerequisite_form').attr('action'),
            type: 'POST',
            data: $('#prerequisite_form').serialize(),

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
                $('#modal_prerequisite').unblock();
            }
        });
        event.preventDefault();
    });
});
