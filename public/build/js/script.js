$(document).bind("contextmenu", function (e) {
	e.preventDefault();
});

$(document).ready(function () {
	// menu / link
	$(document).on('click', '.menus', function (e) {
		e.preventDefault()
		$('.right_col').html('');
		const link = $(this).attr('href');
		const target = $(this).data('menu');
		$("#bodi").load(link);

		// if (target == 'homeKategori') {
		// 	homeKategori(link)
		// } else if (target == 'tambahKategori') {
		// 	tambahKategori(link)
		// } else if (target == 'editKategori') {
		// 	editKategori(link)
		// }
		return false;
	});

	//aksi simpan data
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
