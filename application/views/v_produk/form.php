<div class="x_panel">
    <div class="x_title">
        <h2>Form <?php echo $title ?><small></small></h2>      
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
            <!-- kode_produk -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_produk">Kode Produk<span class="err_kode_produk required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="kode_produk" id="kode_produk"  class="form-control col-md-7 col-xs-12" placeholder="Input Kode Barang" required="required"
                           value="<?php echo (isset($default['kode_produk'])) ? $default['kode_produk'] : ''; ?>"
                           <?php echo (isset($default['readonly_kode_produk'])) ? $default['readonly_kode_produk'] : ''; ?>
                           warna="10" />
                </div>
            </div>
            <!-- nama_produk -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_produk">Nama Barang<span class="err_nama_produk required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="nama_produk" id="nama_produk"  class="form-control col-md-7 col-xs-12" placeholder="Input nama Barang" required="required"
                           value="<?php echo (isset($default['nama_produk'])) ? $default['nama_produk'] : ''; ?>"
                           <?php echo (isset($default['readonly_nama_produk'])) ? $default['readonly_nama_produk'] : ''; ?>
                           warna="10" />
                </div>
            </div>
            <!-- id Kategory -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_kategory">Kategory<span class="err_id_kategory required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="id_kategory" name="id_kategory" >
                        <?php
                        print_r($default['id_kategory']);
                        foreach ($default['id_kategory'] as $row) {
                            ?>

                            <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" 
                                <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?> >
                            <?php echo (isset($row['display'])) ? $row['display'] : ''; ?></option>
<?php } ?>
                    </select>   
                </div>
            </div>
            <!-- id Brand -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_brand">Barnd<span class="err_id_brand required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="id_brand" name="id_brand" >
                        <?php
                        print_r($default['id_brand']);
                        foreach ($default['id_brand'] as $row) {
                            ?>

                            <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" 
                            <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?> >
    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?></option>
<?php } ?>
                    </select>   
                </div>
            </div>
            <!-- id warna -->
             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_warna">Size<span class="err_id_warna required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="id_warna" name="id_warna" >
                        <?php
                        print_r($default['id_warna']);
                        foreach ($default['id_warna'] as $row) {
                            ?>

                            <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" 
                            <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?> >
    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?></option>
<?php } ?>
                    </select>   
                </div>
            </div>
           
            <!-- bahan produk  -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bahan_produk">Bahan Produk<span class="err_bahan_produk">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="bahan_produk" id="bahan_produk"  class="form-control col-md-7 col-xs-12" placeholder="Input Harga Satuan"
                           value="<?php echo (isset($default['bahan_produk'])) ? $default['bahan_produk'] : ''; ?>"
<?php echo (isset($default['readonly_bahan_produk'])) ? $default['readonly_bahan_produk'] : ''; ?>
                           warna="10" />
                </div>
            </div>
             <!-- berat produk  -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="berat_produk">Berat Produk<span class="err_berat_produk">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="bahan_produk" id="bahan_produk"  class="form-control col-md-7 col-xs-12" placeholder="Input berat produk"
                           value="<?php echo (isset($default['berat_produk'])) ? $default['berat_produk'] : ''; ?>"
<?php echo (isset($default['readonly_berat_produk'])) ? $default['readonly_berat_produk'] : ''; ?>
                           warna="10" />
                </div>
            </div>
              <!-- Gambar produk -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gambar_produk">Gambar Produk<span class="err_gambar_produk">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" name="gambar_produk" id="gambar_produk"  class="form-control col-md-7 col-xs-12" placeholder="Input gambar Produk"
                           value="<?php echo (isset($default['gambar_produk'])) ? $default['gambar_produk'] : ''; ?>"
<?php echo (isset($default['readonly_gambar_produk'])) ? $default['readonly_gambar_produk'] : ''; ?>
                           warna="10" />
                </div>
            </div>
               <!--  deskripsi_produk -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deskripsi_produk">deskripsi <span class="err_deskripsi_produk">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="deskripsi_produk" id="deskripsi_produk"  class="form-control col-md-7 col-xs-12" placeholder="Input deskripsi produk"
                           value="<?php echo (isset($default['deskripsi_produk'])) ? $default['deskripsi_produk'] : ''; ?>"
<?php echo (isset($default['readonly_deskripsi_produk'])) ? $default['readonly_deskripsi_produk'] : ''; ?>
                           warna="10" />
                </div>
            </div>
            <!--  stok -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stok">Stok<span class="err_stok">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="stok" id="stok"  class="form-control col-md-7 col-xs-12" placeholder="Input minimal stok"
                           value="<?php echo (isset($default['stok'])) ? $default['stok'] : ''; ?>"
<?php echo (isset($default['readonly_stok'])) ? $default['readonly_stok'] : ''; ?>
                           warna="10" />
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
    $(document).ready(function()
    {
        var buttonsave, buttoncancel, urlpost, urlindex, content;

        buttonsave = $('#submit');
        buttoncancel = $('#cancel');
        urlpost = '<?php echo $url_post; ?>';
        urlindex = '<?php echo $url_index; ?>';


        buttonsave.click(
                function()
                {

                    $.ajax(
                            {
                                type: "POST",
                                url: urlpost,
                                dataType: "json",
                                data: {
                                    id: $("#id").val(),
                                    kode_produk: $("#kode_produk").val(),
                                    nama_produk: $("#nama_produk").val(),
                                    id_kategory: $("#id_kategory").val(),
                                    id_brand: $("#id_brand").val(),
                                    id_warna: $("#id_warna").val(),
                                    gambar_produk: $("#gambar_produk").val(),
                                    bahan_produk: $("#bahan_produk").val(),
                                    berat_produk: $("#berat_produk").val(),
                                    deskrisi_produk: $("#deskrisi_produk").val(),
                                    stok: $("#stok").val(),
                                },
                                cache: false,
                                success:
                                        function(data, text)
                                        {
                                            if (data.hasil == 'true') {
                                                contentcontroller.load(urlindex);
                                            } else {
                                                $(".err_kode_produk").html(data.err_kode_produk).fadeIn('slow');
                                                $(".err_nama_produk").html(data.err_nama_produk).fadeIn('slow');
                                                $(".err_id_kategory").html(data.err_id_kategory).fadeIn('slow');
                                                $(".err_id_brand").html(data.err_id_brand).fadeIn('slow');
                                                $(".err_gambar_produk").html(data.err_gambar_produk).fadeIn('slow');
                                                $(".err_id_warna").html(data.err_id_warna).fadeIn('slow');
                                                $(".err_bahan_produk").html(data.err_bahan_produk).fadeIn('slow');
                                                $(".err_berat_produk").html(data.err_berat_produk).fadeIn('slow');
                                                $(".err_deskripsi_produk").html(data.err_deskripsi_produk).fadeIn('slow');
                                                
                                                $(".err_stok").html(data.err_stok).fadeIn('slow');
                                            }
                                        },
                                error: function(request, status, error) {
                                    alert(request.responseText + " " + status + " " + error);
                                }
                            });
                    return false;


                });

        buttoncancel.click(
                function()
                {
                    contentcontroller.load(urlindex);
                });
    });

</script>