// $(document).bind("contextmenu", function (e) {
// 	e.preventDefault();
// });

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

// alert
// ----> alertSukses
function alertSukses(pesan) {
	var alert = `
		<div class="alert alert-success alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
			</button>
			` + pesan + `
		</div>
	`;
}
// ----> alertGagal
function alertGagal(pesan) {
	var alert = `
		<div class="alert alert-danger alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
			</button>
			` + pesan + `
		</div>
	`;
}

// Kategori
// ----> homeKategori
function homeKategori(link) {
	$.getJSON(link, function (data) {
		var row = '';
		$.each(data.kategori, function () {
			row += `
			<tr>
				<td>` + this['id_kategori'] + `</td>
				<td>` + this['nama_kategori'] + `</td>
				<td>
					<a href="` + baseUrl('eddkor/' + this['id_kategori']) + `" class="btn btn-warning menus">Edit</a>
					<a href="` + baseUrl('hakor/' + this['id_kategori']) + `" class="btn btn-danger menus">Hapus</a>
				</td>
			</tr>`;
		})

		$('#bodi').html(`
		<div class="right_col" role="main">
			<div class="">
				<div class="page-title">
					<div class="title_left">
						<h3>` + data.head + `</h3>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2>List Data ` + data.subhead + `</h2>
								<div style="float: right;">
									<a class="btn btn-success menus" href="` + baseUrl('takor') + `">Tambah</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="bs-example-popovers" id="alert"></div>
								<table id="datatable" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>ID Kategori</th>
											<th>Kategori</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										` + row + `
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		`);
	});
}
