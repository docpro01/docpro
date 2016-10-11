<div style="background: #FFF url('assets/img/background_1.png') repeat; box-shadow: 0 0 1px 1px #e8e8e8; border-bottom: 1px solid #e8e8e8; margin: 0; width: 100%; padding: 16px;">
	<span style="font-weight: bold; margin-left: 10%;">DocPro Business Solutions</span>
	<span class='demo' style="margin-right: 10%; float: right;"><span class='demo2'><p id='bookkeeping'>Bookkeeping System</p></span></span>
</div>
<div class='logo' style="margin: 0 auto; margin-top: -52px; width: 150px; box-shadow: 0 2px 1px 1px #e8e8e8;">
	<img src="<?php base_url() ?>assets/img/logo_setup.png" style='width: 150px;'>
</div>
<div class='container'>
	<div class='row'>
		<div class='col-md-12' style="text-align: center;">
			<h1>Welcome</h1>
			<h3>to</h3>
			<h1><span style="font-weight: bold;"><span style="color: blue;">Doc</span>Pro</span> Bookkeeping System</h1>
		</div>
		<div class='col-md-12' style="margin-top: 10px; text-align: center;">
			<div class='col-md-6 col-md-offset-3 alert-default' style="background-color: #3f51b5; color: #FFF; padding: 10px;">
				<h4 style="font-weight: bold; margin-bottom: 15px; font-size: 22px;">How do you like to setup your account</h4>
				<div class='col-md-12'>
					<div class='col-md-6'>
						<label style="font-size: 16px;"><input type="checkbox" name="setup_type" style="margin: 0;"> Default</label>
						<p>Chart of accounts categories and taxes will be set on default</p>
					</div>
					<div class='col-md-6'>
						<label style="font-size: 16px;"><input type="checkbox" name="setup_type" style="margin: 0;"> Customize</label>
						<p>You can customize your chart of accounts categories and taxes</p>
					</div>
				</div>
			</div>
			<div class='col-md-12'>
				<a id='continue-setup-btn' class='btn btn-primary btn-lg' href="<?php echo base_url(); ?>setup/account" style="margin-top: 50px; background-color: #000 !important; text-transform: none;">Proceed</a>
			</div>
		</div>
	</div>
</div>