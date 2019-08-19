<div class="x_panel">
    <div class="x_title">
        <h2>Data Transaksi</h2>                    
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <p class="text-muted font-13 m-b-30">
            <!-- for descriotion in here > <-->
        </p>
        <table id="datatable-c_transaksi" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Tanggal Pesan</th>
                    <th>Customer</th>
                    <th>Sales</th>
                    <th>Rumah</th>
                    <th>Harga</th>
                    <th>ACTION</th>                   
                </tr>
            </thead>

        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        /* start datatable */
        var handleDataTableButtons = function () {
            if ($("#datatable-c_transaksi").length) {
                $("#datatable-c_transaksi").DataTable({
                    'order': [[0, 'asc']],
                    keys: true,
                    fixedHeader: true,
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse:false,
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
                        {"data": "no_transaksi"},
                        {"data": "tgl_transaksi"},
                        {"data": "tgl_pesan"},
                        {"data": "id_customer"},
                        {"data": "id_sales"},
                        {"data": "id_rumah"},
                        {"data": "harga"},
                       
                        {
                            "data": "id_transaksi", "width": "100px", "sClass": "left",
                            "bSortable": false,
                            "mRender": function (data, type, row) {
                                var btn = "";
                                btn = btn + "<div class='btn-group'>";
                                btn = btn + " <button onClick='ParamFunc.editdata(" + row.id_transaksi + ")' class='btn btn-xs btn-info' type='button'>Edit</button>";
                                btn = btn + " <button onClick='ParamFunc.deletedata(" + row.id_transaksi + ")' class='btn btn-xs btn-info' type='button'>Delete</button>";
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
                init: function () {
                    handleDataTableButtons();
                }
            };
        }();
        TableManageButtons.init();
    });
    /* end datatable */



    /*start edit, delete  function */
    var ParamFunc = {
        editdata: function (id) {
            load_form('<?php echo $url_edit; ?>' + '/' + id, 'Edit Data');
        },
        deletedata: function (id) {
            $('#confirc_transaksi').modal('show');
            $("#confirc_transaksi  input[name=id_transaksi]").val(id);
        }
    }
    /*end edit, delete  function */

    //start delete data
    $("#confirc_transaksi button[action=delete]").click(function () {
        var url;
        url = '<?php echo $url_delete ?>';
        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            cache: false,
            data: {
                id_transaksi: $("#confirc_transaksi input[name=id_transaksi]").val()
            },
            success: function (data) {
                $('#confirc_transaksi').modal('hide');
                $('#datatable-c_transaksi').dataTable().fnReloadAjax();
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