<div class="x_panel">
    <div class="x_title">
        <h2>Form <?php echo $title ?><small></small></h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br />

        <form id="demo-form2" class="form-horizontal form-label-left" enctype="multipart/form-data">
            <input type="hidden" name="id_slider" id="id_slider" value="<?php echo $id; ?>" />
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Judul<span class="err_nama required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="judul" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo (isset($default['judul'])) ? $default['judul'] : ''; ?>" <?php echo (isset($default['readonly_nama'])) ? $default['readonly_nama'] : ''; ?>>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Deskripsi<span class="err_nama required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo (isset($default['deskripsi'])) ? $default['deskripsi'] : ''; ?>" <?php echo (isset($default['readonly_deskripsi'])) ? $default['readonly_nama'] : ''; ?>></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Gambar<span class="err_nama required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="gambar" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo (isset($default['gambar'])) ? $default['gambar'] : ''; ?>" <?php echo (isset($default['readonly_gambar'])) ? $default['readonly_gambar'] : ''; ?>>
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="reset" id="cancel" class="btn btn-primary">Cancel</button>
                    <button type="submit" id="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        console.log('ok');
        var buttonsave, buttoncancel, urlpost, urlindex, content;

        buttonsave = $('#submit');
        buttoncancel = $('#cancel');
        urlpost = '<?php echo $url_post; ?>';
        urlindex = '<?php echo $url_index; ?>';

        $(document).on('submit', '#demo-form2', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: urlpost,
                dataType: "json",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data, text) {
                    if (data.hasil == 'true') {
                        contentcontroller.load(urlindex);
                    } else {
                        $("#err_nama").html(data.err_nama).fadeIn('slow');
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText + " " + status + " " + error);
                }
            });


            return false;
        })

        buttoncancel.click(
            function() {
                contentcontroller.load(urlindex);
            });
        buttonsave.click(
            function(e) {
                e.preventDefault();
                console.log('okk');
            });
    });
</script>