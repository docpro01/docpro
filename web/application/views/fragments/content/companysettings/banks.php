<div class='side-body padding-top'>
	<div class='card'>
		<div class='card-header'>
			<div class='card-title'>
				<div class='title'>Banks</div>
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
				<div id='banks-seq'>
					<ul class='seq-canvas'>
						<li>
							<table id='banks-summary-table' class='table table-hovered table-bordered' style='min-width: 100%;'>
								<thead>
									<th>Sequence</th>
									<th>Code</th>
									<th>Name</th>
									<th>Shortname</th>
									<th>Number</th>
									<th>Classification</th>
								</thead>
							</table>
						</li>
						<li>
							<button id='add' type='button' class='btn btn-info btn-sm btn-raised ripple-effect title' custom-title='Add'><i class='fa fa-plus'></i></button>
							<div class='col-md-12' id='company-table-row'>
								<table id='banks-table' class='table table-hovered table-bordered' style='min-width: 100%;'>
									<thead>
										<th>Options</th>
										<th>Sequence</th>
										<th>Code</th>
										<th>Name</th>
										<th>Shortname</th>
										<th>Number</th>
										<th>Classification</th>
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
<div id='bank-select' style='display: none;'>
	<?php foreach($bank as $b){?>
	<button class='btn btn-default select-option ripple-effect' bank-id='<?php echo $b->b_id;?>' bank-code='<?php echo $b->b_code;?>' type='button' style='width: 100%'><?php echo $b->b_name;?></button>
	<?php }?>
</div>
<div id='add-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add Bank</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>company_settings/banks/add' method='post' class='body'>
			<div class='modal-body'>
				<table width='90%'>
					<tr>
						<input type='hidden' name='add-bank-id'>
						<input type='hidden' name='add-bank-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' name='add-bank' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon add-bank-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Number</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-number'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Classification</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-classification'></td>
					</tr>
				</table>
			</div>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='add-options' style='background-color: white; overflow-y: scroll;'>
	</div>
</div>
<div id='view-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 9px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">View Bank</h4>
	</div>
	<div>
		<div class='view-modal-body'>
			<div class='modal-body'>
				<input id='view-seq' type='text' style='border: none; float: right; width: 46px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px;' disabled>
				<label style='float: right;'>Sequence: </label>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Code</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='view-code' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input id='view-bank' class='form-control' type='text' placeholder='Select...' readonly>
							</div>
						</td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='view-shortname' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Number</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='view-number' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Classification</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='view-classification' class='form-control' type='text' readonly></td>
					</tr>
				</table>
			</div>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px; width: 497px;'>
				<button class='btn btn-info btn-sm close-popover btn-raised ripple-effect' type='button' data-dismiss='modal' style='float: right;'>Close</button>
			</div>
		</div>
	</div>
</div>
<div id='edit-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Bank</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>company_settings/banks/edit' method='post' class='body'>
			<div class='modal-body'>
				<input id='edit-seq' type='text' style='border: none; float: right; width: 46px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px;' disabled>
				<label style='float: right;'>Sequence: </label>
				<table width='90%'>
					<tr>
						<input id='edit-bank-id' type='hidden' name='edit-bank-id'>
						<input id='edit-bank-code' type='hidden' name='edit-bank-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input id='edit-bank' class='form-control' type='text' name='edit-bank' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon edit-bank-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Number</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='edit-number' class='form-control' type='text' name='edit-number'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Classification</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='edit-classification' class='form-control' type='text' name='edit-classification'></td>
					</tr>
				</table>
			</div>
			<input type='hidden' id='edit-id' name='edit-id' value=''>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='edit-options' style='background-color: white;'>
	</div>
</div>
<div id='update-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal'  style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Update Bank</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>company_settings/banks/update' method='post' class='body'>
			<div class='modal-body'>
				<input type='text' style='border: none; float: right; width: 46px; text-align: center; font-weight: bold; background-color: white; margin-right: 44px;' disabled>
				<label style='float: right;'>Sequence: </label>
				<table width='90%'>
					<tr>
						<input id='update-bank-id' type='hidden' name='update-bank-id'>
						<input id='update-bank-code' type='hidden' name='update-bank-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input id='update-bank' class='form-control' type='text' name='update-bank' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon update-bank-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Number</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='update-number' class='form-control' type='text' name='update-number'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Classification</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='update-classification' class='form-control' type='text' name='update-classification'></td>
					</tr>
				</table>
			</div>
			<input type="hidden" id='update-id' name="update-id">
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='update-options' style='background-color: white;'>
	</div>
</div>