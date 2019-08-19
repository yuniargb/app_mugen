<div class="x_panel">
	<div class="x_title">
		<h2>Form <?php echo $title ?><small></small></h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br />
		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
			<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
			<!-- nama rumah-->
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_rumah">Nama Rumah<span class="err_nama_rumah required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="nama_rumah" required="required" class="form-control col-md-7 col-xs-12"
					value="<?php echo (isset($default['nama_rumah'])) ? $default['nama_rumah'] : ''; ?>"
					<?php echo (isset($default['readonly_nama_rumah'])) ? $default['readonly_nama_rumah'] : ''; ?>
					>
				</div>
			</div>
                        <!-- kode_kawasan-->
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_kawasan">Kode Kawasan<span class="err_kode_kawasan required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="kode_kawasan" required="required" class="form-control col-md-7 col-xs-12"
					value="<?php echo (isset($default['kode_kawasan'])) ? $default['kode_kawasan'] : ''; ?>"
					<?php echo (isset($default['readonly_kode_kawasan'])) ? $default['readonly_kode_kawasan'] : ''; ?>
					>
				</div>
			</div>
                        <!-- kode_blok-->
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_blok">Kode Blok<span class="err_kode_blok required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="kode_blok" required="required" class="form-control col-md-7 col-xs-12"
					value="<?php echo (isset($default['kode_blok'])) ? $default['kode_blok'] : ''; ?>"
					<?php echo (isset($default['readonly_kode_blok'])) ? $default['readonly_kode_blok'] : ''; ?>
					>
				</div>
			</div>
                        <!-- harga-->
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="harga">Harga<span class="err_harga required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="harga" required="required" class="form-control col-md-7 col-xs-12"
					value="<?php echo (isset($default['harga'])) ? $default['harga'] : ''; ?>"
					<?php echo (isset($default['readonly_harga'])) ? $default['readonly_harga'] : ''; ?>
					>
				</div>
			</div>
                         <!-- luas_tanah-->
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="luas_tanah">Luas Tanah <span class="err_luas_tanah required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="luas_tanah" required="required" class="form-control col-md-7 col-xs-12"
					value="<?php echo (isset($default['luas_tanah'])) ? $default['luas_tanah'] : ''; ?>"
					<?php echo (isset($default['readonly_luas_tanah'])) ? $default['readonly_luas_tanah'] : ''; ?>
					>
				</div>
			</div>
                          <!-- luas_bangunan-->
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="luas_bangunan">Luas Bangunan <span class="err_luas_bangunan required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="luas_bangunan" required="required" class="form-control col-md-7 col-xs-12"
					value="<?php echo (isset($default['luas_bangunan'])) ? $default['luas_bangunan'] : ''; ?>"
					<?php echo (isset($default['readonly_luas_bangunan'])) ? $default['readonly_luas_bangunan'] : ''; ?>
					>
				</div>
			</div>
                            <!-- gambar-->
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="gambar">Gambar <span class="err_gambar required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="gambar" required="required" class="form-control col-md-7 col-xs-12"
					value="<?php echo (isset($default['gambar'])) ? $default['gambar'] : ''; ?>"
					<?php echo (isset($default['readonly_gambar'])) ? $default['readonly_gambar'] : ''; ?>
					>
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
	$(document).ready(function ()
	{
		var buttonsave, buttoncancel, urlpost, urlindex, content;
		buttonsave = $('#submit');
		buttoncancel = $('#cancel');
		urlpost = '<?php echo $url_post; ?>';
		urlindex = '<?php echo $url_index; ?>';
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
						nama_rumah: $("#nama_rumah").val(),
						kode_kawasan: $("#kode_kawasan").val(),
                                                kode_blok: $("#kode_blok").val(),
                                                harga: $("#harga").val(),
                                                luas_tanah: $("#luas_tanah").val(),
                                                luas_bangunan: $("#luas_bangunan").val(),
                                                gambar: $("#gambar").val(),
						
						
						
					},
					cache: false,
					success:
						function (data, text)
						{
							if (data.hasil =='true') {
								contentcontroller.load(urlindex);
							} else { 
								$(".err_nama_rumah").faxtml(data.err_nama_rumah).fadeIn('slow');
								$(".err_kode_kawasan").faxtml(data.err_kode_kawasan).fadeIn('slow');
                                                                $(".err_kode_blok").faxtml(data.err_kode_blok).fadeIn('slow');
                                                                $(".err_harga").faxtml(data.err_harga).fadeIn('slow');
                                                                $(".err_luas_tanah").faxtml(data.err_luas_tanah).fadeIn('slow');
                                                                $(".err_luas_bangunan").faxtml(data.err_luas_bangunan).fadeIn('slow');
                                                                $(".err_gambar").faxtml(data.err_gambar).fadeIn('slow');
								
								
							}
						},
					error: function (request, status, error) {
						alert(request.responseText + " " + status + " " + error);
					}
				});
				return false
			});
		buttoncancel.click(
		function ()
		{
			contentcontroller.load(urlindex);
		});
	});
</script>
					
				
			
		
					
					
