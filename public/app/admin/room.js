$(function(){

	$(".menu_room").addClass("active");

    $('#view_button').click(function(event){

        $("#table_data").html('');

        $('html').block({
            message: '<span class="text-white"><i class="icon-spinner10 spinner"></i> Loading data..</span>',
            overlayCSS: {backgroundColor:'#000',opacity:0.8},
            css: {border:0,padding:0,backgroundColor:'none'}
        });

        $.ajax({
            url: url + "room/search",
            type: 'POST',
            data: {'school_id' : $("#school_id_search").val()},

            success: function(response)
            {
                var data = "";

                if (response.length == 0)
                {
                    new PNotify({
                        title: 'Empty',
                        text: 'There are no rooms saved.',
                        addclass: 'bg-warning'
                    });
                }

                for (var i = 0; i< response.length; i++)
                {
                    data += "<tr id='room_"+response[i].id+"'>" +
                                "<td>" + response[i].id + "</td>" +
                                "<td>" + response[i].name + "</td>" +
                                "<td class='text-right'>" + "<button id='"+response[i].id+"' class='btn btn-xs btn-danger' onClick='promptDelete(this.id)'><i class='icon-bin position left'></i> Delete</button>" +
                            "</tr>";
                }

                $("#table_data").append(data);
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

        success: function()
        {
            swal({
                title: "Deleted!",
                text: "The room has been deleted",
                confirmButtonColor: "#66BB6A",
                type: "success"
            });

            $("#room_" + room_id).remove();
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