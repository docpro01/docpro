<div class='side-body padding-top'>
	<div class='card custom-card'>
		<div class='card-header'>
			<div class='card-title'>
				<div class='title'>Taxes</div>
			</div>
		</div>
		<div class='card-body' style='padding: 10px 0 0 0;'>
			<div class='row'>
				<div id='setup-tab-1' class='setup-tab active col-md-6'>
					<button type='button' class='btn btn-default btn-sm btn-flat ripple-effect btn-seq <?php if($seq_active === '1'){ echo 'seq-selected'; } ?>' style='margin: 0;'>
						<span>Tax Types</span>
					</button>
				</div>
				<div id='setup-tab-2' class='setup-tab col-md-6'>
					<button type='button' class='btn btn-default btn-sm btn-flat ripple-effect btn-seq <?php if($seq_active === '2'){ echo 'seq-selected'; } ?>' style='margin: 0;'>
						<span>Tax Codes</span>
					</button>
				</div>
				<input type="hidden" id='seq-active' name="seq-active" value="<?php echo $seq_active; ?>">
			</div>
			<div class='row' style="margin-right: 0; margin-left: 0;">
				<div id='tax-seq'>
					<ul class='seq-canvas'>
						<li>
							<div class='col-md-12' id='top-table-row' style="padding: 0;">
								<button type='button' id='add-tt' class='btn btn-info btn-sm btn-raised ripple-effect title' custom-title='Add'><i class='fa fa-plus'></i></button>
								<table id='tax-types-table' class='table table-hovered table-bordered' style="min-width: 100%;">
									<thead>
										<th></th>
										<th>Code</th>
										<th>Name</th>
										<th>Short Name</th>
									</thead>
								</table>
							</div>
						</li>
						<li>
							<div class='col-md-12' id='taxes-table-row' style="padding: 0;">
								<button id='add' type='button' class='btn btn-info btn-sm btn-raised ripple-effect title' custom-title='Add'><i class='fa fa-plus'></i></button>
								<table id='taxes-table' class='table table-hovered table-bordered' style="min-width: 99.9%;">
									<thead>
										<th></th>
										<th>Sequence</th>
										<th>Code</th>
										<th>Type</th>
										<th>Name</th>
										<th>Shortname</th>
										<th>Rate</th>
										<th>Base</th>
									</thead>
								</table>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- TAX TYPES -->
<div id='tt-view-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px solid #C1C1C1; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">View Tax Types</h4>
	</div>
	<div>
		<div class='tt-body'>
			<div class='tt-modal-body'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Code</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='tt-view-code' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='tt-view-name' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Short Name</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='tt-view-shortname' class='form-control' type='text' readonly></td>
					</tr>
				</table>
			</div>
			<div class='tt-modal-footer' style='border-top: 1px solid #C1C1C1; padding-top: 5px; padding-bottom: 0px;'>
				<button id='close-btn' class='btn btn-info btn-sm btn-raised ripple-effect' type='button' style='float: right;'>Close</button>
			</div>
		</div>
	</div>
</div>
<div id='tt-add-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px solid #C1C1C1; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add Tax Types</h4>
	</div>
	<div>
		<form action="<?php echo base_url(); ?>docpro_setup/taxtypes/add" method='post'>
			<div class='tt-body'>
				<div class='tt-modal-body'>
					<table width='90%'>
						<tr>
							<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
							<td colspan='3' style='padding-top: 10px;'><input id='tt-add-name' name='tt-add-name' class='form-control no-space' type='text' required></td>
						</tr>
						<tr>
							<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Short Name</label></td>
							<td colspan='3' style='padding-top: 5px;'><input id='tt-add-shortname' name='tt-add-shortname' class='form-control no-space' type='text' required></td>
						</tr>
					</table>
				</div>
				<div class='tt-modal-footer' style='border-top: 1px solid #C1C1C1; padding-top: 5px; padding-bottom: 0px;'>
					<button class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>Ok</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div id='tt-edit-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px solid #C1C1C1; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Tax Types</h4>
	</div>
	<div>
		<form action="<?php echo base_url(); ?>docpro_setup/taxtypes/edit" method='post'>
			<div class='tt-body'>
				<div class='tt-modal-body'>
					<table width='90%'>
						<tr>
							<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Code</label></td>
							<td colspan='3' style='padding-top: 10px;'><input id='tt-edit-code' name='tt-edit-code' class='form-control number no-space' type='text' readonly></td>
						</tr>
						<tr>
							<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
							<td colspan='3' style='padding-top: 5px;'><input id='tt-edit-name' name='tt-edit-name' class='form-control no-space' type='text' required></td>
						</tr>
						<tr>
							<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Short Name</label></td>
							<td colspan='3' style='padding-top: 5px;'><input id='tt-edit-shortname' name='tt-edit-shortname' class='form-control no-space' type='text' required></td>
						</tr>
					</table>
				</div>
				<input type="hidden" id='tt-edit-id' name="tt-edit-id">
				<div class='tt-modal-footer' style='border-top: 1px solid #C1C1C1; padding-top: 5px; padding-bottom: 0px; padding-right: 18px;'>
					<button class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>Ok</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div id='tt-update-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px solid #C1C1C1; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Update Tax Types</h4>
	</div>
	<div>
		<form action="<?php echo base_url(); ?>docpro_setup/taxtypes/update" method='post'>
			<div class='tt-body'>
				<div class='tt-modal-body'>
					<table width='90%'>
						<tr>
							<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Code</label></td>
							<td colspan='3' style='padding-top: 10px;'><input id='tt-update-code' name='tt-update-code' class='form-control number no-space' type='text' readonly></td>
						</tr>
						<tr>
							<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
							<td colspan='3' style='padding-top: 5px;'><input id='tt-update-name' name='tt-update-name' class='form-control no-space' type='text' required></td>
						</tr>
						<tr>
							<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Short Name</label></td>
							<td colspan='3' style='padding-top: 5px;'><input id='tt-update-shortname' name='tt-update-shortname' class='form-control no-space' type='text' required></td>
						</tr>
					</table>
				</div>
				<input type="hidden" id='tt-update-id' name="tt-update-id">
				<div class='tt-modal-footer' style='border-top: 1px solid #C1C1C1; padding-top: 5px; padding-bottom: 0px; padding-right: 18px;'>
					<button class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>Ok</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div id='tt-delete-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px solid #C1C1C1; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Delete Tax Types</h4>
	</div>
	<div>
		<form action="<?php echo base_url(); ?>docpro_setup/taxtypes/delete" method='post'>
			<div class='tt-body'>
				<div class='tt-modal-body'>
					<table width='90%'>
						<tr>
							<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Code</label></td>
							<td colspan='3' style='padding-top: 10px;'><input id='tt-delete-code' name='tt-delete-code' class='form-control number no-space' type='text' readonly></td>
						</tr>
						<tr>
							<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
							<td colspan='3' style='padding-top: 5px;'><input id='tt-delete-name' name='tt-delete-name' class='form-control no-space' type='text' required readonly></td>
						</tr>
						<tr>
							<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Short Name</label></td>
							<td colspan='3' style='padding-top: 5px;'><input id='tt-delete-shortname' name='tt-delete-shortname' class='form-control no-space' type='text' required readonly></td>
						</tr>
					</table>
				</div>
				<input type="hidden" id='tt-delete-id' name="tt-delete-id">
				<div class='tt-modal-footer' style='border-top: 1px solid #C1C1C1; padding-top: 5px; padding-bottom: 0px; padding-right: 18px;'>
					<button class='btn btn-danger btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>Ok</button>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- TAXES -->
<div id='t-type-select' style='display: none;'>
	<?php foreach($tt_type as $tt){?>
	<button class='btn btn-default select-option ripple-effect' style='width: 100%; margin-bottom: 0;' type-id='<?php echo $tt->tt_id;?>' type-code='<?php echo $tt->tt_code;?>' type='button'><?php echo $tt->tt_name;?></button>
	<?php }?>
</div>
<div id='add-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add Tax</h4>
	</div>
	<div class='col-md-8'>
		<form action="<?php echo base_url(); ?>docpro_setup/taxes/add" method='post' class='body'>
			<div class='modal-body'>
				<table width='90%'>
					<tr>
						<input type='hidden' name='add-type-id'>
						<input type='hidden' name='add-type-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Type</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control required-readonly' type='text' name='add-type' placeholder='Select...' required>
								<span type='button' class='input-group-addon add-type-btn hand-pointer ripple-effect'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 5px;'><input class='form-control no-space' type='text' name='add-name' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 5px;'><input class='form-control no-space' type='text' name='add-shortname' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Rate</label></td>
						<td colspan='3' style='padding-top: 5px;'><input class='form-control no-space decimal' type='text' name='add-rate' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Base</label></td>
						<td colspan='3' style='padding-top: 5px;'><input class='form-control no-space decimal' type='text' name='add-base' required></td>
					</tr>
				</table>
			</div>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>Ok</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='add-options' style='background-color: white; overflow-y: scroll;'>
	</div>
</div>
<div id='view-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 9px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">View Tax</h4>
	</div>
	<div class='view-body'>
		<div class='modal-body'>
			<input id='view-seq' type='text' style='border: none; float: right; width: 46px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px;' disabled>
			<label style='float: right;'>Sequence: </label>
			<table width='90%'>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Code</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-code' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Type</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-type' class='form-control' type='text' placeholder='Select...' readonly>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-name' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-shortname' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Rate</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-rate' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Base</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-base' class='form-control' type='text' readonly></td>
				</tr>
			</table>
		</div>
	</div>
	<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px; width: 100%;'>
		<button id='close-btn' class='btn btn-info btn-sm close-popover btn-raised ripple-effect' type='button' data-dismiss='modal' style='float: right;'>Close</button>
	</div>
</div>
<div id='edit-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Tax</h4>
	</div>
	<div class='col-md-8'>
		<form action="<?php echo base_url(); ?>docpro_setup/taxes/edit" method='post' class='body'>
			<div class='modal-body'>
				<input id='edit-seq' type='text' style='border: none; float: right; width: 46px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px;' disabled>
				<label style='float: right;'>Sequence: </label>
				<table width='90%'>
					<tr>
						<input id='edit-type-id' type='hidden' name='edit-type-id'>
						<input id='edit-type-code' type='hidden' name='edit-type-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Type</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input id='edit-type' class='form-control' type='text' name='edit-type' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon edit-type-btn hand-pointer ripple-effect'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='edit-name' class='form-control no-space' type='text' name='edit-name' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='edit-shortname' class='form-control no-space' type='text' name='edit-shortname' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Rate</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='edit-rate' class='form-control decimal' type='text' name='edit-rate' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Base</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='edit-base' class='form-control decimal' type='text' name='edit-base' required></td>
					</tr>
				</table>
			</div>
			<input type='hidden' id='edit-id' name='edit-id' value=''>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='edit-options' style='background-color: white; overflow-y: scroll;'>
	</div>
</div>
<div id='update-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Update Tax</h4>
	</div>
	<div class='col-md-8'>
		<form action="<?php echo base_url(); ?>docpro_setup/taxes/update" method='post' class='body'>
			<div class='modal-body'>
				<input id='update-seq' type='text' style='border: none; float: right; width: 46px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px;' disabled>
				<label style='float: right;'>Sequence: </label>
				<table width='90%'>
					<tr>
						<input id='update-type-id' type='hidden' name='update-type-id'>
						<input id='update-type-code' type='hidden' name='update-type-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Type</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input id='update-type' class='form-control' type='text' name='update-type' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon update-type-btn hand-pointer ripple-effect'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='update-name' class='form-control no-space' type='text' name='update-name' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='update-shortname' class='form-control no-space' type='text' name='update-shortname' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Rate</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='update-rate' class='form-control decimal' type='text' name='update-rate' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Base</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='update-base' class='form-control decimal' type='text' name='update-base' required></td>
					</tr>
				</table>
			</div>
			<input id='update-id' name='update-id' type='hidden'>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='update-options' style='background-color: white; overflow-y: scroll;'>
	</div>
</div>
<div id='delete-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Delete Tax</h4>
	</div>
	<div class='col-md-12' style="padding: 0;">
		<form action="<?php echo base_url(); ?>docpro_setup/taxes/delete" method='post' class='body'>
			<div class='modal-body'>
				<input id='delete-seq' type='text' style='border: none; float: right; width: 46px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px;' disabled>
				<label style='float: right;'>Sequence: </label>
				<table width='90%'>
					<tr>
						<input id='delete-type-id' type='hidden' name='delete-type-id'>
						<input id='delete-type-code' type='hidden' name='delete-type-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Type</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='delete-type' class='form-control' type='text' name='delete-type' placeholder='Select...' readonly readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='delete-name' class='form-control no-space' type='text' name='delete-name' required readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='delete-shortname' class='form-control no-space' type='text' name='delete-shortname' required readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Rate</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='delete-rate' class='form-control decimal' type='text' name='delete-rate' required readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Base</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='delete-base' class='form-control decimal' type='text' name='delete-base' required readonly></td>
					</tr>
				</table>
			</div>
			<input id='delete-id' name='delete-id' type='hidden'>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-danger btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
</div>