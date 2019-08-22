// $(document).bind("contextmenu", function (e) {
// 	e.preventDefault();
// });

$(document).ready(function () {
	// $('#datatable').DataTable({
	// 	"processing": true, //Feature control the processing indicator.
	// 	"serverSide": true, //Feature control DataTables' server-side processing mode.
	// 	"order": [], //Initial no order.

	// 	// Load data for the table's content from an Ajax source
	// 	"ajax": {
	// 		"url": baseUrl('datak'),
	// 		"type": "POST"
	// 	},

	// 	//Set column definition initialisation properties.
	// 	"columnDefs": [{
	// 		"targets": [0], //first column / numbering column
	// 		"orderable": false, //set not orderable
	// 	}, ],
	// });
	// menu / link
	$(document).on('click', '.menus', function (e) {
		e.preventDefault()
		$('.right_col').html('');
		const link = $(this).attr('href');
		const target = $(this).data('menu');
		$("#bodi").load(link);
		return false;
	});

	//aksi simpan data
	$(document).on('submit', '.form-data', function (e) {
		e.preventDefault();
		$('.right_col').html('');

		const data = $(this).serialize();
		const link = $(this).attr('action');
		$.ajax({
			url: link,
			type: 'POST',
			data: data,
			dataType: 'json',
			success: function (res) {
				if (res.hasil == 1) {
					$("#bodi").load(baseUrl(res.to));
					$("#alert").show();
				} else {
					$("#bodi").load(baseUrl(res.to));
				}
			}
		});
	});
});
