<!-- <div class='side-body padding-top'>
	<div class='card'>
		<div class='card-header'>
			<div class='card-title'>
				<div class='title'>Others</div>
			</div>
		</div>
		<div class='card-body' style='padding: 0;'>
			<div class='row'>
				<div id='setup-tab-1' class='setup-tab active col-md-6'>
					<button type='button' class='btn btn-default btn-sm btn-flat ripple-effect btn-seq <?php if($seq_active === '1'){ echo 'seq-selected'; } ?>' style='margin: 0;'>
						<span>Summary</span>
					</button>
				</div>
				<div id='setup-tab-2' class='setup-tab col-md-6'>
					<button type='button' class='btn btn-default btn-sm btn-flat ripple-effect btn-seq <?php if($seq_active === '2'){ echo 'seq-selected'; } ?>' style='margin: 0;'>
						<span>Setting</span>
					</button>
				</div>
				<input type="hidden" id='seq-active' name="seq-active" value="<?php echo $seq_active; ?>">
			</div>
			<div class='row' style="margin-right: 0; margin-left: 0; padding-right: 20px; padding-left: 20px;">
				<div id='others-seq'>
					<ul class='seq-canvas'>
						<li>
							<table id='others-summary-table' class='table table-bordered' style="min-width: 100%;">
								<thead>
									<th>Name</th>
								</thead>
							</table>
						</li>
						<li>
							<button id='add' type='button' class='btn btn-info btn-sm btn-raised ripple-effect'><i class='fa fa-plus'></i></button>
							<div class='col-md-12' id='others-table-row'>
								<table id='others-table' class='table table-hovered table-bordered' style="min-width: 100%;">
									<thead>
										<th>Options</th>
										<th>Name</th>
									</thead>
								</table>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div> -->
<div class='side-body padding-top hide-table-setting'>
	<div class='card custom-card col-md-9 main-table-panel'>
		<div class='card-header'>
			<div class='card-title'>
				<div class='title'>Others</div>
			</div>
		</div>
		<div class='card-body hide-table-setting' style='padding: 0;'>
			<div class='row'>
				<div class='col-md-12' style="margin-top: 25px;">
					<div class='col-md-12' id='others-table-row' style="padding: 0;">
						<button id='add' type='button' class='btn btn-info btn-sm btn-raised ripple-effect'><i class='fa fa-plus'></i></button>
						<table id='others-table' class='table table-hovered table-bordered' style="min-width: 100%;">
							<thead>
								<th>Options</th>
								<th>Name</th>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class='col-md-1' style="width: 32px; padding: 0;">
		<button type='button' class='btn btn-dark btn-sm ripple-effect table-setting-toggle'>Table Setting</button>
	</div>
	<div class='col-md-2 table-setting-panel'>
		<div class='col-md-12' style="padding: 0;">
			<div class='col-md-12' style="padding: 0; height: 60px;">
				<button type='button' class='btn btn-default btn-sm ripple-effect close-table-option' style="float: left; margin: 0; height: 100%;">X</button>
				<h3 class='option-title' style="margin-left: 65px;">Table Setting</h3>
			</div>
			<div class='col-md-12'>
				<table class='table option-table'>
					<tr>
						<td><p>Search</p></td>
						<td><input type="text" class='form-control search'></td>
					</tr>
					<tr>
						<td><p>Entries</p></td>
						<td>
							<select type="text" class='form-control entry'>
								<option value='10'>10</option>
								<option value='25'>25</option>
								<option value='50'>50</option>
								<option value='100'>100</option>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan='2' style="padding-bottom: 0;"><p>Show Action Buttons</p></td>
					</tr>
					<tr>
						<td colspan='2' style="padding-top: 0;"><input id="switch-state" class='bootstrap-switch' type="checkbox" checked data-on-text="Yes" data-off-text="No"></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<div id='add-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add Other</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>company_settings/others/add' method='post' class='body'>
			<div class='modal-body'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 100px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-name'></td>
					</tr>
				</table>
			</div>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button id='close-btn' class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>Ok</button>
			</div>
		</form>
	</div>
</div>
<div id='view-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">View Other</h4>
	</div>
	<div>
		<div class='view-modal-body'>
			<div class='modal-body'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 100px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='view-name' class='form-control' type='text' readonly></td>
					</tr>
				</table>
			</div>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button id='close-btn' class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>Close</button>
			</div>
		</div>
	</div>
</div>
<div id='edit-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Other</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>company_settings/others/edit' method='post' class='body'>
			<div class='modal-body'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 100px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='edit-name' class='form-control' type='text' name='edit-name'></td>
					</tr>
				</table>
			</div>
			<input type='hidden' id='edit-id' name='edit-id'>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
	</div>
</div>
<div id='update-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Update Other</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>company_settings/others/update' method='post' class='body'>
			<div class='modal-body'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 100px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='update-name' class='form-control' type='text' name='update-name'></td>
					</tr>
				</table>
			</div>
			<input type="hidden" id='update-id' name="update-id">
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
</div>