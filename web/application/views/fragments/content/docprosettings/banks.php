<div class='side-body padding-top hide-table-setting'>
	<div class='card custom-card col-md-9 main-table-panel'>
		<div class='card-header'>
			<div class='card-title'>
				<div class='title'>Banks</div>
			</div>
		</div>
		<div class='card-body' style='padding: 0;'>
			<button id='add' type='button' class='btn btn-info btn-sm btn-raised ripple-effect title' custom-title='Add'><i class='fa fa-plus'></i></button>
			<div class='row'>
				<div class='col-md-12' id='banks-table-row'>
					<table id='banks-table' class='table table-hovered table-bordered' style="min-width: 100%;">
						<thead>
							<th></th>
							<th>Code</th>
							<th>Name</th>
							<th>Shortname</th>
						</thead>
					</table>
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
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add Bank</h4>
	</div>
	<div>
		<form action="<?php echo base_url(); ?>docpro_settings/banks/add" method='post' class='body'>
			<div class='modal-body'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control no-space' type='text' name='add-name' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 5px;'><input class='form-control no-space' type='text' name='add-shortname' required></td>
					</tr>
				</table>
			</div>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>Ok</button>
			</div>
		</form>
	</div>
</div>
<div id='view-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">View Bank</h4>
	</div>
	<div>
		<div class='body'>
			<div class='modal-body'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Code</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='view-code' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='view-name' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='view-shortname' class='form-control' type='text' readonly></td>
					</tr>
				</table>
			</div>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button id='close-btn' class='btn btn-info btn-sm btn-raised ripple-effect' type='button' style='float: right;'>Close</button>
			</div>
		</div>
	</div>
</div>
<div id='edit-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Bank</h4>
	</div>
	<div>
		<form action="<?php echo base_url(); ?>docpro_settings/banks/edit" method='post' class='body'>
			<div class='modal-body'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='edit-name' class='form-control no-space' type='text' name='edit-name' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='edit-shortname' class='form-control no-space' type='text' name='edit-shortname' required></td>
					</tr>
				</table>
			</div>
			<input type='hidden' id='edit-id' name='edit-id' value=''>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
</div>
<div id='update-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Update Bank</h4>
	</div>
	<div>
		<form action="<?php echo base_url(); ?>docpro_settings/banks/update" method='post' class='body'>
			<div class='modal-body'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='update-name' class='form-control no-space' type='text' name='update-name' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='update-shortname' class='form-control no-space' type='text' name='update-shortname' required></td>
					</tr>
				</table>
			</div>
			<input type='hidden' id='update-id' name='update-id' value=''>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
</div>