<<<<<<< HEAD
<div class="x_panel">
    <div class="x_title">
        <h2>Data Size</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <p class="text-muted font-13 m-b-30">
            <!-- for descriotion in here > <-->
        </p>
        <table id="datatable-c_size" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Size</th>
                    <th>Action</th>
                </tr>
            </thead>

        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        /* start datatable */
        var handleDataTableButtons = function() {
            if ($("#datatable-c_size").length) {
                $("#datatable-c_size").DataTable({
                    'order': [
                        [0, 'asc']
                    ],
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
                    buttons: [{
                            text: '+ Add',
                            key: '1',
                            className: "btn-sm",
                            action: function(e, dt, node, config) {
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
                    "columns": [{
                            "data": "nama_size"
                        },
                        {
                            "data": "id_size",
                            "width": "100px",
                            "sClass": "left",
                            "bSortable": false,
                            "mRender": function(data, type, row) {
                                var btn = "";
                                btn = btn + "<div class='btn-group'>";
                                btn = btn + " <button onClick='ParamFunc.editdata(" + row.id_size + ")' class='btn btn-xs btn-info' type='button'>Edit</button>";
                                btn = btn + " <button onClick='ParamFunc.deletedata(" + row.id_size + ")' class='btn btn-xs btn-info' type='button'>Delete</button>";
                                btn = btn + "</div>";
                                return btn;
                            }
                        }
                    ]
                });
            }
        };
        TableManageButtons = function() {
            "use strict";
            return {
                init: function() {
                    handleDataTableButtons();
                }
            };
        }();
        TableManageButtons.init();
    });
    /* end datatable */



    /*start edit, delete  function */
    var ParamFunc = {
        editdata: function(id) {
            load_form('<?php echo $url_edit; ?>' + '/' + id, 'Edit Data');
        },
        deletedata: function(id) {
            $('#confirc_size').modal('show');
            $("#confirc_size  input[name=id_size]").val(id);
        }
    }
    /*end edit, delete  function */

    //start delete data
    $("#confirc_size button[action=delete]").click(function() {
        var url;
        url = '<?php echo $url_delete ?>';
        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            cache: false,
            data: {
                id_size: $("#confirc_size input[name=id_size]").val()
            },
            success: function(data) {
                $('#confirc_size').modal('hide');
                if (data.hasil === true) {
                    console.log('ok');
                    $('#datatable-c_size').dataTable().fnReloadAjax();
                } else {
                    console.log('gagal');
                }
            }
        });
    });
    //end delete data

    /*start add function */
    function adddata() {
        load_form('<?php echo $url_add; ?>', 'Add Data');
    }
    /*end add function */
=======
<div class ="x_panel">
	<div class="x_title">
		<h2>Data Size</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<p class="text-muted font-13 m-b-30">
		</p>
		<table id="datatable-master_size" class="table table-striped table-bordered">
			<thead>
				<tr>
				
					<th>Size</th>
					<th>Action</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<script>
	$(document).ready(function () {
		var handleDataTableButtons = function () {
			if ($("#datatable-master_size").length) {
				$("#datatable-master_size").DataTable( {
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
					
					{"data": "nama_size"},
					{
						"data": "id_size", "width": "100px", "sClass": "left", 
						"bSortable": false,
						"mRender": function (data, type, row) {
							var btn ="";
							btn = btn + "<div class='btn-group'>";
							btn = btn + " <button onClick='ParamFunc.editdata(" + row.id_size + ")' class='btn btn-xs btn-info' type='button'>Edit</button>";
							btn = btn + " <button onClick='ParamFunc.deletedata(" + row.id_size + ")' class='btn btn-xs btn-info' type='button'>Delete</button>";
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
			$("#Confirmdelete input[name=id_size]").val(id);
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
				id_size: $("#Confirmdelete input[name=id_size]").val()
			},
			success: function (data) {
				$('#Confirmdelete').modal('hide');
				$('#datatable-master_size').dataTable().fnReloadAjax();
			}
		});
	});
	
	function adddata() {
		load_form('<?php echo $url_add; ?>', 'Add Data');
	}
>>>>>>> d45323a4af42f33d09d19f15e8d7cd56036b9266
</script>