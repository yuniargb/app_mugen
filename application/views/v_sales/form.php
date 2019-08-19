<div class="x_panel">
	<div class="x_title">
		<h2>Form <?php echo $title ?><small></small></h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br />
		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
			<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
			<!-- nama sales-->
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_sales">Nama Sales<span class="err_nama_sales required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="nama_sales" required="required" class="form-control col-md-7 col-xs-12"
					value="<?php echo (isset($default['nama_sales'])) ? $default['nama_sales'] : ''; ?>"
					<?php echo (isset($default['readonly_nama_sales'])) ? $default['readonly_nama_sales'] : ''; ?>
					>
				</div>
			</div>
                        <!-- nohp-->
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="telpon">Telpon<span class="err_telpon required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="telpon" required="required" class="form-control col-md-7 col-xs-12"
					value="<?php echo (isset($default['telpon'])) ? $default['telpon'] : ''; ?>"
					<?php echo (isset($default['readonly_telpon'])) ? $default['readonly_telpon'] : ''; ?>
					>
				</div>
			</div>
                        <!-- alamat-->
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat<span class="err_alamat required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="alamat" required="required" class="form-control col-md-7 col-xs-12"
					value="<?php echo (isset($default['alamat'])) ? $default['alamat'] : ''; ?>"
					<?php echo (isset($default['readonly_alamat'])) ? $default['readonly_alamat'] : ''; ?>
					>
				</div>
			</div>
                        <!-- email-->
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="err_email required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="email" required="required" class="form-control col-md-7 col-xs-12"
					value="<?php echo (isset($default['email'])) ? $default['email'] : ''; ?>"
					<?php echo (isset($default['readonly_email'])) ? $default['readonly_email'] : ''; ?>
					>
				</div>
			</div>
                         <!-- jk-->
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="jk">Jenis Kelamin<span class="err_jk required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="jk" required="required" class="form-control col-md-7 col-xs-12"
					value="<?php echo (isset($default['jk'])) ? $default['jk'] : ''; ?>"
					<?php echo (isset($default['readonly_jk'])) ? $default['readonly_jk'] : ''; ?>
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
						nama_sales: $("#nama_sales").val(),
						telpon: $("#telpon").val(),
                                                alamat: $("#alamat").val(),
                                                email: $("#email").val(),
                                                jk: $("#jk").val(),
						
						
						
					},
					cache: false,
					success:
						function (data, text)
						{
							if (data.hasil =='true') {
								contentcontroller.load(urlindex);
							} else { 
								$(".err_nama_sales").faxtml(data.err_nama_sales).fadeIn('slow');
								$(".err_telpon").faxtml(data.err_telpon).fadeIn('slow');
                                                                $(".err_alamat").faxtml(data.err_alamat).fadeIn('slow');
                                                                $(".err_email").faxtml(data.err_email).fadeIn('slow');
                                                                $(".err_jk").faxtml(data.err_jk).fadeIn('slow');
								
								
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
					
				
			
		
					
					
