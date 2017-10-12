$(function() {

	$(".menu_prerequisite").addClass("active");

	$.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{
            orderable: false,
            targets: -1,
            width: '100px'
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });

    $('.datatable-basic').DataTable();
});

function promptDelete(subject_id){

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
            deletePrereq(subject_id);
        }
    });
}

function deletePrereq(subject_id){
    $.ajax({
        url: url + "prerequisite/delete",
        type: 'POST',
        data: {"subject_id": subject_id},

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
                    text: "The prerequisite is still in use",
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
