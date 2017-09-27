$(document).ready(function(){

    $('#add_curriculum_form').submit(function(event){

        $('html').block({
            message: '<span class="text-white"><i class="icon-spinner10 spinner"></i> Adding Course ..</span>',
            overlayCSS: {backgroundColor:'#000',opacity:0.8},
            css: {border:0,padding:0,backgroundColor:'none'}
        });

        $.ajax({
            url: $('#add_curriculum_form').attr('action'),
            type: 'POST',
            data: $('#add_curriculum_form').serialize(),

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

function promptDelete(curriculum_id){

    swal({
        title: "Are you sure?",
        text: "This will be permanently deleted.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#EF5350",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        closeOnConfirm: true,
        closeOnCancel: true
    },

    function(isConfirm){
        if (isConfirm)
        {
            deleteCurriculum(curriculum_id);
        }
    });
}

function deleteCurriculum(curriculum_id){
    $.ajax({
        url: url + "curriculum/delete",
        type: 'POST',
        data: {"id": curriculum_id},

        success: function(response)
        {
            if (response.status == 'success')
            {
                window.location.reload();
            }
            else
            {
                swal({
                    title: "Error!",
                    text: "The course is still in use",
                    confirmButtonColor: "#66BB6A",
                    type: "error"
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
        }
    });
}
