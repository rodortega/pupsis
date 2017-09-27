$(function() {

	$(".menu_school").addClass("active");

    $('.editable_school').editable({
    	url: url + '/school/edit',
        rows: 4,
        showbuttons: 'bottom'
    });
});

function promptDelete(school_id){

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
            deleteSchool(school_id);
        }
    });
}

function deleteSchool(school_id){
    $.ajax({
        url: url + "school/delete",
        type: 'POST',
        data: {"id": school_id},

        success: function(response)
        {
            if (response.status == 'success')
            {
                swal({
                    title: "Deleted!",
                    text: "The school has been deleted",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });

                $("#school_" + room_id).remove();
            }
            else
            {
                swal({
                    title: "Error!",
                    text: "The school is still in use",
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