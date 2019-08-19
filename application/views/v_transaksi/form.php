<div class="x_panel">
    <div class="x_title">
        <h2>Form <?php echo $title ?><small></small></h2>      
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
            <!-- No Transaksi -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_transaksi">No Transaksi<span class="err_no_transaksi required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="no_transaksi" id="no_transaksi"  class="form-control col-md-7 col-xs-12" placeholder="Input Transaksi" required="required"
                           value="<?php echo (isset($default['no_transaksi'])) ? $default['no_transaksi'] : ''; ?>"
                           <?php echo (isset($default['readonly_no_transaksi'])) ? $default['readonly_no_transaksi'] : ''; ?>
                           size="10" />
                </div>
            </div>
            <!-- Tanggal Transaksi -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_transaksi">Tanggal Transaksi<span class="err_tgl_transaksi required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="tgl_transaksi" id="tgl_transaksi"  class="date-picker form-control col-md-7 col-xs-12" data-date-format="dd-mm-yyyy" placeholder="Input Tanggal Transaksi" required="required"
                           value="<?php echo (isset($default['tgl_transaksi'])) ? $default['tgl_transaksi'] : ''; ?>"
<?php echo (isset($default['readonly_tgl_transaksi'])) ? $default['readonly_tgl_transaksi'] : ''; ?>
                           size="10" />
                </div>
            </div>
             <!-- Tanggal pesan -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_pesan">Tanggal Pesan<span class="err_tgl_pesan required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="tgl_pesan" id="tgl_pesan"  class="date-picker form-control col-md-7 col-xs-12" data-date-format="dd-mm-yyyy" placeholder="Input Tanggal Pesan" required="required"
                           value="<?php echo (isset($default['tgl_pesan'])) ? $default['tgl_pesan'] : ''; ?>"
<?php echo (isset($default['readonly_tgl_pesan'])) ? $default['readonly_tgl_pesan'] : ''; ?>
                           size="10" />
                </div>
            </div>
            <!-- customer -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_customer">Customer<span class="err_id_customer required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="id_customer" name="id_customer" >
                            <?php print_r($default['id_customer']); foreach ($default['id_customer'] as $row) { ?>
                                
                                <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" 
                                        <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?> >
                                    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?></option>
                            <?php } ?>
                        </select>   
                </div>
            </div>
            <!-- sales -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_sales">Sales<span class="err_id_sales required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="id_sales" name="id_sales" >
                            <?php print_r($default['id_sales']); foreach ($default['id_sales'] as $row) { ?>
                                
                                <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" 
                                        <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?> >
                                    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?></option>
                            <?php } ?>
                        </select>   
                </div>
            </div>
             <!-- rumah -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_rumah">Rumah<span class="err_id_rumah required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="id_rumah" name="id_rumah" >
                            <?php print_r($default['id_rumah']); foreach ($default['id_rumah'] as $row) { ?>
                                
                                <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" 
                                        <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?> >
                                    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?></option>
                            <?php } ?>
                        </select>   
                </div>
            </div>
           <!-- harga -->
           <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="harga">Harga<span class="err_harga required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="harga" id="harga"  class="form-control col-md-7 col-xs-12" placeholder="Input Harga" required="required"
                           value="<?php echo (isset($default['harga'])) ? $default['harga'] : ''; ?>"
                           <?php echo (isset($default['readonly_harga'])) ? $default['readonly_harga'] : ''; ?>
                           size="10" />
                </div>
            </div>
            <!-- END -->
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="reset" id="cancel" class="btn btn-primary">Cancel</button>
                    <button type="submit" id ="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function ()
    {
        var buttonsave, buttoncancel, urlpost, urlindex, content;

        buttonsave = $('#submit');
        buttoncancel = $('#cancel');
        urlpost = '<?php echo $url_post; ?>';
        urlindex = '<?php echo $url_index; ?>';
       


        $('#tgl_transaksi').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_4",
            format: "dd-mm-yy"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
         $('#tgl_pesan').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_4",
            format: "dd-mm-yy"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });


        buttonsave.click(
                function ()
                {
                    
                    $.ajax(
                            {
                                type: "POST",
                                url: urlpost,
                                dataType: "json",                                 
                                data: {
                                    id: $("#id").val(),
                                    no_transaksi: $("#no_transaksi").val(),
                                    tgl_transaksi: $("#tgl_transaksi").val(),
                                    tgl_pesan: $("#tgl_pesan").val(),
                                    id_customer: $("#id_customer").val(),
                                    id_sales: $("#id_sales").val(),
                                    id_rumah: $("#id_rumah").val(),
                                    harga: $("#harga").val(),
                                },
                                cache: false,
                                success:
                                        function (data, text)
                                        {
                                            if (data.hasil == 'true') {
                                               contentcontroller.load(urlindex); 
                                            } else {
                                                $(".err_no_transaksi").html(data.err_no_transaksi).fadeIn('slow');
                                                $(".err_tgl_transaksi").html(data.err_tgl_transaksi).fadeIn('slow');
                                                $(".err_tgl_pesan").html(data.err_tgl_pesan).fadeIn('slow');
                                                $(".err_id_customer").html(data.err_id_customer).fadeIn('slow');
                                                $(".err_id_sales").html(data.err_id_sales).fadeIn('slow');
                                                $(".err_id_rumah").html(data.err_id_rumah).fadeIn('slow');
                                                $(".err_harga").html(data.err_id_harga).fadeIn('slow');
                                                
                                               
                                            }
                                        },
                                error: function (request, status, error) {
                                    alert(request.responseText + " " + status + " " + error);
                                }
                            });
                    return false;


                });
                
        buttoncancel.click(
                function ()
                {
                  contentcontroller.load(urlindex); 
                });




    });

</script>