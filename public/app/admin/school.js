$(function() {

	$(".menu_school").addClass("active");

    $('.editable_school').editable({
    	url: url + '/school/edit',
        rows: 4,
        showbuttons: 'bottom'
    });
});
