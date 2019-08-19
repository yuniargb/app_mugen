<div class ="x_panel">
	<div class="x_title">
		<h2>Data Rumah</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<p class="text-muted font-13 m-b-30">
		</p>
		<table id="datatable-c_rumah" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nama Rumah</th>
					<th>Kode Kawasan</th>
                                        <th>Kode Blok</th>
                                        <th>Harga</th>
                                        <th>Luas Tanah</th>
                                        <th>Luas Bangunan</th>
                                        <th>Gambar</th>
					
					<th>Action</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<script>
	$(document).ready(function () {
		var handleDataTableButtons = function () {
			if ($("#datatable-c_rumah").length) {
				$("#datatable-c_rumah").DataTable( {
					'order': [[0, 'asc']],
					keys: true,
					fixedHeader: true,
					deferRender: true,
					scrollY: 380,
					scrollCollapse: false,
					scroller: false,
					dom: "Bfrtip",
					"bRetrieve": true,
					"bDestroy": true,
					lengthMenu: [
						[10, 25, 50, -1],
						['10 rows', '25 rows', '50 rows', 'Show all']
					],
					buttons: [
					{
						text: '+ Add',
						key: '1',
						className: "btn-sm",
						action: function (e, dt, node, config) {
							adddata();
						}
					},
					{
						extend: "copy",
						key: '2',
						className: "btn-sm"
					},
					{
						extend: "csv",
						key: '3',
						className: "btn-sm"
					},
					{
						extend: "print",
						key: '5',
						className: "btn-sm"
					},
				],
				responsive: true,
				"ajax": {
					"url": '<?php echo $url_grid; ?>',
					"type": 'POST',
				},
				"columns": [
					
					{"data": "nama_rumah"},
					{"data": "kode_kawasan"},
                                        {"data": "kode_blok"},
                                        {"data": "harga"},
                                        {"data": "luas_tanah"},
                                        {"data": "luas_bangunan"},
                                        {"data": "gambar"},
					
					{
						"data": "id_rumah", "width": "100px", "sClass": "left", 
						"bSortable": false,
						"mRender": function (data, type, row) {
							var btn ="";
							btn = btn + "<div class='btn-group'>";
							btn = btn + " <button onClick='ParamFunc.editdata(" + row.id_rumah + ")' class='btn btn-xs btn-info' type='button'>Edit</button>";
							btn = btn + " <button onClick='ParamFunc.deletedata(" + row.id_rumah + ")' class='btn btn-xs btn-info' type='button'>Delete</button>";
							btn = btn + "</div>";
							return btn;
					}
				}
			]
		});
			}
		};
		TableManageButtons = function () {
			"use strict";
			return {
				init: function (){
					handleDataTableButtons();
				}
			};
		}();
		TableManageButtons.init();
	});
	
	var ParamFunc = {
		editdata: function (id) {
			load_form('<?php echo $url_edit; ?>' + '/' + id, 'Edit Data');
		},
		deletedata: function (id) {
			$('#Confirmdelete').modal('show');
			$("#Confirmdelete input[name=id_rumah]").val(id);
		}
	}
	
	$("#Confirmdelete button[action=delete]").click(function () {
		var url;
		url = '<?php echo $url_delete ?>';
		$.ajax({
			url: url,
			type: "post",
			dataType: "json",
			cache: false,
			data: {
				id_rumah: $("#Confirmdelete input[name=id_rumah]").val()
			},
			success: function (data) {
				$('#Confirmdelete').modal('hide');
				$('#datatable-c_rumah').dataTable().fnReloadAjax();
			}
		});
	});
	
	function adddata() {
		load_form('<?php echo $url_add; ?>', 'Add Data');
	}
</script>