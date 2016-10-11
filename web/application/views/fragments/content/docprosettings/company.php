<div class='side-body padding-top hide-table-setting'>
	<div class='card custom-card col-md-9 main-table-panel'>
		<div class='card-header'>
			<div class='card-title'>
				<div class='title'>Companies</div>
			</div>
		</div>
		<div class='card-body hide-table-setting' style='padding: 0;'>
			<div class='row'>
				<div class='col-md-12' style="margin-top: 25px;">
					<table id='company-table' class='table table-hovered table-bordered' style='min-width: 99.8%'>
						<thead>
							<th></th>
							<th>Seq.</th>
							<th>Name</th>
							<th>Address</th>
							<th>TIN</th>
							<th>Type</th>
							<th>Tax</th>
							<th>Contact Number</th>
							<th>Email</th>
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
<div id='cb-type-select' style='display: none;'>
	<?php foreach($bpt_type as $bpt){?>
	<button class='btn btn-default select-option-type ripple-effect' type-id='<?php echo $bpt->bpt_id;?>'  type-code='<?php echo $bpt->bpt_code;?>' type='button' style='width: 100%'><?php echo $bpt->bpt_type;?></button>
	<?php }?>
</div>
<div id='cb-tax-type-select' style='display: none;'>
	<?php foreach($tt_name as $tt){if($tt->tt_code == 2 || $tt->tt_code == 8){?>
	<button class='btn btn-default select-option-tax-type ripple-effect' tax-type-id='<?php echo $tt->tt_id;?>' tax-type-code='<?php echo $tt->tt_code;?>' type='button' style='width: 100%'><?php echo $tt->tt_name;?></button>
	<?php }}?>
</div>
<div id='view-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 9px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">View Company</h4>
	</div>
	<div class='view-body'>
		<div class='modal-body'>
			<input id='view-seq' type='text' style='border: none; float: right; width: 85px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px; text-align: left;' disabled>
			<label style='float: right; padding-top: 1px; padding-right: 2px; margin: 0;'>Sequence: </label>
			<table width='90%'>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-name' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-address' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>TIN</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-tin' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Classification</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-class' class='form-control' type='text' readonly>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Type</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-type' class='form-control' type='text' placeholder='Select...' readonly>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Tax</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-tax-type' class='form-control' type='text' readonly>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Contact Number</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-cno' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Email</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-email' class='form-control' type='text' readonly></td>
				</tr>
			</table>
		</div>
		<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
			<button id='close-btn' class='btn btn-info btn-sm close-popover btn-raised ripple-effect' type='button' data-dismiss='modal' style='float: right;'>Close</button>
		</div>
	</div>
</div>
<div id='edit-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Company</h4>
	</div>
	<form action="<?php echo base_url(); ?>docpro_settings/company/edit" method='post' class='body'>
		<div class='modal-body'>
			<input id='edit-seq' type='text' style='border: none; float: right; width: 87px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px; text-align: left;' disabled>
			<label style='float: right; padding-top: 1px; padding-right: 2px; margin: 0;'>Sequence: </label>
			<table width='90%'>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='edit-name' class='form-control' type='text' name='edit-name' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='edit-address' class='form-control no-space' type='text' name='edit-address'  required></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Contact Number</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='edit-cno' class='form-control no-space number' type='text' name='edit-cno' required></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Email</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='edit-email' class='form-control no-space' type='email' name='edit-email' required></td>
				</tr>
			</table>
		</div>
		<input type='hidden' id='edit-id' name='edit-id'>
		<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
			<button class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>OK</button>
		</div>
	</form>
</div>
<div id='update-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Update Company</h4>
	</div>
	<form action="<?php echo base_url(); ?>docpro_settings/company/update" method='post' class='body'>
		<div class='modal-body'>
			<input id='update-seq' type='text' style='border: none; float: right; width: 85px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px; text-align: left;' disabled>
			<label style='float: right; padding-top: 1px; padding-right: 2px; margin: 0;'>Sequence: </label>
			<table width='90%'>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='update-name' class='form-control' type='text' name='update-name' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='update-address' class='form-control no-space' type='text' name='update-address' required></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Contact Number</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='update-cno' class='form-control no-space' type='text' name='update-cno' required></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Email</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='update-email' class='form-control no-space' type='email' name='update-email' required></td>
				</tr>
			</table>
		</div>
		<input type='hidden' id='update-id' name='update-id'>
		<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
			<button class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>OK</button>
		</div>
	</form>
</div>