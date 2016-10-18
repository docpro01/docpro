<div class='side-body padding-top hide-table-setting'>
	<div class='card custom-card col-md-9 main-table-panel'>
		<div class='card-header'>
			<div class='card-title'>
				<div class='title'>Branches</div>
			</div>
		</div>
		<div class='card-body hide-table-setting' style='padding: 0;'>
			<div class='row'>
				<div class='col-md-12' style="margin-top: 25px;">
					<div class='col-md-12' id='branches-table-row' style="padding: 0;">
						<button id='add' type='button' class='btn btn-info btn-sm btn-raised ripple-effect title' custom-title='Add'><i class='fa fa-plus'></i></button>
						<table id='branches-table' class='table table-bordered' style="min-width: 1400px;">
							<thead>
								<th>Opts.</th>
								<th>Name</th>
								<th>Address</th>
								<th>TIN</th>
								<th>Tax Type</th>
								<th>Contact Number</th>
								<th>Email</th>
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
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add Branch</h4>
	</div>
	<form action='<?php echo base_url(); ?>/company_settings/branches/add' method='post' class='body'>
		<div class='modal-body'>
			<table width='90%'>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Name</label></td>
					<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-name'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Address</label></td>
					<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-address'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>TIN</label></td>
					<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-tin'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Contact Number</label></td>
					<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-cno'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Email</label></td>
					<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-email'></td>
				</tr>
			</table>
		</div>
		<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
			<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>Ok</button>
		</div>
	</form>
</div>
<div id='view-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 9px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">View Branch</h4>
	</div>
	<div class='view-body'>
		<div class='view-modal-body'>
			<input id='view-seq' type='text' style='border: none; float: right; width: 46px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px;' disabled>
			<label style='float: right; margin: 1px;'>Sequence: </label>
			<table width='90%'>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Name</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-name' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Address</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-address' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>TIN</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-tin' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Tax Type</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-tax-type' class='form-control' type='text' readonly>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Contact Number</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-cno' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Email</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-email' class='form-control' type='text' readonly></td>
				</tr>
			</table>
		</div>
		<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px; width: 100%;'>
			<button id='close-btn' class='btn btn-info btn-sm close-popover btn-raised ripple-effect' type='button' data-dismiss='modal' style='float: right;'>Close</button>
		</div>
	</div>
</div>
<div id='edit-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Branch</h4>
	</div>
	<form action='branches/edit' method='post' class='body'>
		<div class='modal-body'>
			<input id='edit-seq' type='text' style='border: none; float: right; width: 46px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px;' disabled>
			<label style='float: right; margin: 1px;'>Sequence: </label>
			<table width='93%'>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Name</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='edit-name' class='form-control' type='text' name='edit-name'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Address</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='edit-address' class='form-control' type='text' name='edit-address'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>TIN</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='edit-tin' class='form-control' type='text' name='edit-tin'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Contact Number</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='edit-cno' class='form-control' type='text' name='edit-cno'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Email</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='edit-email' class='form-control' type='text' name='edit-email'></td>
				</tr>
			</table>
		</div>
		<input type='hidden' id='edit-id' name='edit-id'>
		<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
			<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>OK</button>
		</div>
	</form>
</div>
<div id='update-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Update Branch</h4>
	</div>
	<form action='branches/update' method='post' class='body'>
		<div class='modal-body'>
			<input id='update-seq' type='text' style='border: none; float: right; width: 46px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px;' disabled>
			<label style='float: right; margin: 1px;'>Sequence: </label>
			<table width='93%'>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Name</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='update-name' class='form-control' type='text' name='update-name'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Address</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='update-address' class='form-control' type='text' name='update-address'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>TIN</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='update-tin' class='form-control' type='text' name='update-tin'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Contact Number</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='update-cno' class='form-control' type='text' name='update-cno'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Email</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='update-email' class='form-control' type='text' name='update-email'></td>
				</tr>
			</table>
		</div>
		<input type='hidden' id='update-id' name='update-id'>
		<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
			<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>OK</button>
		</div>
	</form>
</div>