$(function(){
	$(".menu_reservation").addClass("active");

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
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });

    $('.datatable-basic').DataTable();

    $("#reservation_form").submit(function(event){

        var form = $("#reservation_form");

        $('html').block({
            message: '<span class="text-white"><i class="icon-spinner10 spinner"></i> Checking room availability ..</span>',
            overlayCSS: {backgroundColor:'#000',opacity:0.8},
            css: {border:0,padding:0,backgroundColor:'none'}
        });

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),

            success: function(response)
            {
                if (response.status == "success")
                {
                    new PNotify({
                        title: 'Successful',
                        text: 'New Reservation is now pending.',
                        addclass: 'bg-success'
                    });

                    $('#modal_reservation').modal('hide');
                    form[0].reset();
                }

                else if (response.status == "unavailable")
                {
                    new PNotify({
                        title: 'Unavailable',
                        text: 'The room and time combination is not available.',
                        addclass: 'bg-warning'
                    });
                }

                else if (response.status == "error")
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
                $('html').unblock();
            }
        });
        event.preventDefault();
    });
});
