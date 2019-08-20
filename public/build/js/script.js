$(document).ready(function () {

	$(document).on('click', '.menus', function (e) {
		e.preventDefault()
		$('.right_col').html('');
		const link = $(this).attr('href');
		$("#bodi").load(link);
		return false;
	});

	$(document).on('submit', '.form-data', function (e) {
		e.preventDefault();
		const data = $(this).serialize();
		const link = $(this).attr('action');
		$.ajax({
			url: link,
			type: 'POST',
			data: data,
			success: function (res) {
				console.log(res);
			}
		});
	});
});
