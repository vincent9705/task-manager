$(document).ready(function() {
    $('#project-dropdown').select2();
})

$(document).on('click', '#open-project-modal', function(e) {
	e.preventDefault();

	var url = $(this).attr('url');
	var title = $(this).attr('modal-title');

    $('#modal').modal('show').find('.modal-content').load(url);
	$('#modal-label').html(title);
});

$(document).on('click', '#add-project-btn', function(e) {
    e.preventDefault();

	var url = urlCreateProject;
	var data = {name: $("#add-project-name").val()};

	$.get(url, data,function( data ) {
		if (data.error)	{
			alert(data.msg);
		}
		else if (data.success) {
			alert(data.msg);
			$("#modal").modal('hide');
			location.reload();
		}
	});
})