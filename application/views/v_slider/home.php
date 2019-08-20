<div class="x_panel">
    <div class="x_title">
        <h2>Data Slider</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <p class="text-muted font-13 m-b-30">
            <!-- for descriotion in here > <-->
        </p>
        <table id="datatable-c_slider" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
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
            if ($("#datatable-c_slider").length) {
                $("#datatable-c_slider").DataTable({
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
            $('#confirc_slider').modal('show');
            $("#confirc_slider  input[name=id_size]").val(id);
        }
    }
    /*end edit, delete  function */

    //start delete data
    $("#confirc_slider button[action=delete]").click(function() {
        var url;
        url = '<?php echo $url_delete ?>';
        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            cache: false,
            data: {
                id_size: $("#confirc_slider input[name=id_size]").val()
            },
            success: function(data) {
                $('#confirc_slider').modal('hide');
                if (data.hasil === true) {
                    console.log('ok');
                    $('#datatable-c_slider').dataTable().fnReloadAjax();
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
</script>