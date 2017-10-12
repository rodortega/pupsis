$(function() {

	$(".menu_subject").addClass("active");

	$.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{
            orderable: false,
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
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropdownopup');
        }
    });

    $('.datatable-basic').DataTable();

    $('.editable_subject').editable({
    	url: url + '/subject/edit',
        rows: 4,
        showbuttons: 'bottom'
    });
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
            deleteSubject(subject_id);
        }
    });
}

function deleteSubject(subject_id){
    $.ajax({
        url: url + "subject/delete",
        type: 'POST',
        data: {"id": subject_id},

        success: function(response)
        {
            if (response.status == 'success')
            {
                swal({
                    title: "Deleted!",
                    text: "The subject has been deleted",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });

                $("#subject_" + subject_id).remove();
            }
            else
            {
                swal({
                    title: "Error!",
                    text: "The subject is still in use",
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
