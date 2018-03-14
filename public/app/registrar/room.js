$(function(){

	$(".menu_room").addClass("active");
});

function promptDelete(room_id){

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
            deleteRoom(room_id);
        }
    });
}

function deleteRoom(room_id){
    $.ajax({
        url: url + "room/delete",
        type: 'POST',
        data: {"id": room_id},

        success: function(response)
        {
            if (response.status == 'success')
            {
                swal({
                    title: "Deleted!",
                    text: "The room has been deleted",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });

                $("#room_" + room_id).remove();
            }
            else
            {
                swal({
                    title: "Error!",
                    text: "The room is still in use",
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

$('#room_form').submit(function(event){

    $('html').block({
        message: '<i class="icon-spinner2 spinner"></i><br><br> Saving info ..',
        overlayCSS: {backgroundColor:'#fff',opacity:0.8,cursor:'wait'},
        css: {border:0,padding:0,backgroundColor:'none'}
    });

    $.ajax({
        url: $('#room_form').attr('action'),
        type: 'POST',
        data: $('#room_form').serialize(),

        success: function(response)
        {
            if (response.status == "success")
            {
                new PNotify({
                    title: 'Saving Successful.',
                    text: 'Room has been added.',
                    addclass: 'bg-success'
                });

                location.reload();
            }
            else
            {
                new PNotify({
                    title: 'Error',
                    text: 'There might be an error on your input. Please check again.',
                    addclass: 'bg-danger'
                });
            }

            $("#room_form")[0].reset();
            $("#table_data").html('');
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