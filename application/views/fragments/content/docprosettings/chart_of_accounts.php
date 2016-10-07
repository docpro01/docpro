<div class='side-body padding-top hide-table-setting'>
	<div class='card custom-card col-md-9 main-table-panel'>
		<div class='card-header'>
			<div class='card-title'>
				<div class='title'>Chart of Accounts</div>
			</div>
		</div>
		<div class='card-body' style='padding: 0;'>
			<?php 
				if(count($acc_elements) > 0){ ?>
					<button id='add-coa' class='btn btn-info btn-sm btn-raised ripple-effect title' custom-title='Add'><i class='fa fa-plus'></i></button>
					<table id='create-table' class='table table-bordered' style='min-width: 99.9%'>
						<thead>
							<th></th>
							<th>Code</th>
							<th>Name</th>
							<th>BIR Classification</th>
						</thead>
					</table>
			<?php	
				}else{ ?>
					<div class='col-md-5 col-md-offset-3' style='margin-top: 20px; margin-bottom: 20px; border: 1px solid #e5e5e5; padding: 20px; text-align: center;'>
						<p>
							<i class='fa fa-warning' style='font-size: 30px; color: #000;'></i>
						</p>
						<label>Please setup the levels of your chart of accounts</label>
						<p>
							<a href='<?php echo base_url(); ?>docpro_setup/chart_of_accounts' style='text-decoration: underline;'>Setup my chart of account levels</a>
						</p>
					</div>
			<?php	
				}
			?>
			
		</div>
	</div>
	<div class='col-md-1' style="width: 32px; padding: 0;">
		<button type='button' class='btn btn-dark btn-sm ripple-effect table-setting-toggle'><i class='fa fa-caret-left'></i></button>
	</div>
	<div class='col-md-2 table-setting-panel'>
		<div class='col-md-12' style="padding: 0;">
			<div class='col-md-12' style="padding: 0; height: 60px;">
				<button type='button' class='btn btn-default btn-sm ripple-effect close-table-option' style="float: left; margin: 0; height: 100%;">X</button>
				<h3 class='option-title' style="margin-left: 65px;">Option</h3>
			</div>
			<hr>
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

<!-- NEW MODALS -->
<div id='add-coa-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 9px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add COA</h4>
	</div>
	<form action="<?php echo base_url(); ?>docpro_settings/chart_of_accounts/coa_add" method="post">
		<div class='modal-body'>
			<table width='90%'>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 1</label></td>
					<td style='width: 45px;'><input id='add-coa-dis-lvl1-code' class='form-control' type="text" name="lvl1_code" readonly style="width: 100%; text-align: center;"></td>
					<td style='padding-top: 5px;'>
						<select id='coa-add-lvl-1' name='coa-add-lvl-1' class='form-control' required>
							<option value="">Select...</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 2</label></td>
					<td style='width: 45px;'><input id='add-coa-dis-lvl2-code' class='form-control' type="text" name="lvl2_code" readonly style="width: 100%; text-align: center;"></td>
					<td style='padding-top: 5px;'>
						<select id='coa-add-lvl-2' name='coa-add-lvl-2' class='form-control' required>
							<option value="">Select...</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 3</label></td>
					<td style='width: 45px;'><input id='add-coa-dis-lvl3-code' class='form-control' type="text" name="lvl1_code" readonly style="width: 100%; text-align: center;"></td>
					<td style='padding-top: 5px;'>
						<select id='coa-add-lvl-3' name='coa-add-lvl-3' class='form-control' required>
							<option value="">Select...</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 4</label></td>
					<td style='width: 45px;'><input id='add-coa-dis-lvl4-code' class='form-control' type="text" name="lvl1_code" readonly style="width: 100%; text-align: center;"></td>
					<td style='padding-top: 5px;'>
						<select id='coa-add-lvl-4' name='coa-add-lvl-4' class='form-control' required>
							<option value="">Select...</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 5</label></td>
					<td style='width: 45px;'><input id='add-coa-dis-lvl5-code' class='form-control' type="text" name="lvl1_code" readonly style="width: 100%; text-align: center;"></td>
					<td style='padding-top: 5px;'>
						<select id='coa-add-lvl-5' name='coa-add-lvl-5' class='form-control' required disabled>
						</select>
						<input type="hidden" id='coa-add-lvl-5-input' name="coa-add-lvl-5-input">
					</td>
				</tr>
				<!-- <tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Account Name</label></td>
					<td colspan='2' style='padding-top: 5px;'>
						<input id='coa-add-lvl-6' name='coa-add-lvl-6' class='form-control' required>
					</td>
				</tr> -->
				
			</table>
			<div style='border-top: 1px solid #C1C1C1; margin-top: 15px; background-color: #F1F1F1; padding-bottom: 10px;'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Code</label></td>
						<td colspan='2' style='padding-top: 10px;'><input id='coa-add-code' name='coa-add-code' class='form-control' type='text' readonly style='text-align: center; background-color: #F9F9F9;' required>
						</td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Account Name</label></td>
						<td colspan='2' style='padding-top: 5px;'><input id='coa-add-name' name='coa-add-name' class='form-control no-space' type='text' style="text-align: center;" required>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px; width: 100%;'>
			<button class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>Ok</button>
		</div>
	</form>
</div>

<div id='view-coa-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 9px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">View COA</h4>
	</div>
	<div class='modal-body'>
		<table width='90%'>
			<tr>
				<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 1</label></td>
				<td style='width: 45px; padding-top: 10px;'><input id='view-coa-dis-lvl1-code' class='form-control' type="text" readonly style="width: 100%; text-align: center;"></td>
				<td style='padding-top: 10px;'>
					<input id='coa-view-lvl-1' class='form-control' readonly>
				</td>
			</tr>
			<tr>
				<td style='padding-top: 8px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 2</label></td>
				<td style='width: 45px; padding-top: 8px;'><input id='view-coa-dis-lvl2-code' class='form-control' type="text" readonly style="width: 100%; text-align: center;"></td>
				<td style='padding-top: 8px;'>
					<input id='coa-view-lvl-2' class='form-control' readonly>
				</td>
			</tr>
			<tr>
				<td style='padding-top: 8px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 3</label></td>
				<td style='width: 45px; padding-top: 8px;'><input id='view-coa-dis-lvl3-code' class='form-control' type="text" readonly style="width: 100%; text-align: center;"></td>
				<td style='padding-top: 8px;'>
					<input id='coa-view-lvl-3' class='form-control' readonly>
				</td>
			</tr>
			<tr>
				<td style='padding-top: 8px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 4</label></td>
				<td style='width: 45px; padding-top: 8px;'><input id='view-coa-dis-lvl4-code' class='form-control' type="text" readonly style="width: 100%; text-align: center;"></td>
				<td style='padding-top: 8px;'>
					<input id='coa-view-lvl-4' class='form-control' readonly>
				</td>
			</tr>
			<tr>
				<td style='padding-top: 8px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 5</label></td>
				<td style='width: 45px; padding-top: 8px;'><input id='view-coa-dis-lvl5-code' class='form-control' type="text" readonly style="width: 100%; text-align: center;"></td>
				<td style='padding-top: 8px;'>
					<input id='coa-view-lvl-5' class='form-control' readonly>
				</td>
			</tr>
			<!-- <tr>
				<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 6</label></td>
				<td style='width: 40px; padding-top: 5px;'><input id='view-coa-dis-lvl6-code' class='form-control' type="text" readonly style="width: 100%; text-align: center;"></td>
				<td style='padding-top: 5px;'>
					<input id='coa-view-lvl-6' class='form-control' readonly>
				</td>
			</tr> -->
			
		</table>
		<div style='border-top: 1px solid #C1C1C1; margin-top: 15px; background-color: #F1F1F1; padding-bottom: 10px;'>
			<table width='90%'>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Code</label></td>
					<td colspan='2' style='padding-top: 10px;'><input id='coa-view-code' class='form-control' type='text' readonly style='text-align: center; background-color: #FFF;'>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Account Name</label></td>
					<td colspan='2' style='padding-top: 5px;'><input id='coa-view-name' class='form-control' type='text' style="text-align: center; background-color: #FFF;" readonly>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px; width: 100%;'>
		<button class='btn btn-info btn-sm btn-raised ripple-effect close-popover' type='button' style='float: right;'>Close</button>
	</div>
</div>

<div id='edit-coa-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 9px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit COA</h4>
	</div>
	<form action="<?php echo base_url(); ?>docpro_settings/chart_of_accounts/coa_edit" method="post">
		<div class='modal-body'>
			<table width='90%'>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 1</label></td>
					<td style='width: 45px;'><input id='edit-coa-dis-lvl1-code' class='form-control' type="text" name="lvl1_code" readonly style="width: 100%; text-align: center; height: 34.5px;"></td>
					<td style='padding-top: 5px;'>
						<select id='coa-edit-lvl-1' name='coa-edit-lvl-1' class='form-control' required>
							<option value="">Select...</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 2</label></td>
					<td style='width: 45px;'><input id='edit-coa-dis-lvl2-code' class='form-control' type="text" name="lvl2_code" readonly style="width: 100%; text-align: center; height: 34.5px;"></td>
					<td style='padding-top: 5px;'>
						<select id='coa-edit-lvl-2' name='coa-edit-lvl-2' class='form-control' required>
							<option value="">Select...</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 3</label></td>
					<td style='width: 45px;'><input id='edit-coa-dis-lvl3-code' class='form-control' type="text" name="lvl1_code" readonly style="width: 100%; text-align: center; height: 34.5px;"></td>
					<td style='padding-top: 5px;'>
						<select id='coa-edit-lvl-3' name='coa-edit-lvl-3' class='form-control' required>
							<option value="">Select...</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 4</label></td>
					<td style='width: 45px;'><input id='edit-coa-dis-lvl4-code' class='form-control' type="text" name="lvl1_code" readonly style="width: 100%; text-align: center; height: 34.5px;"></td>
					<td style='padding-top: 5px;'>
						<select id='coa-edit-lvl-4' name='coa-edit-lvl-4' class='form-control' required>
							<option value="">Select...</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 5</label></td>
					<td style='width: 45px;'><input id='edit-coa-dis-lvl5-code' class='form-control' type="text" name="lvl1_code" readonly style="width: 100%; text-align: center; height: 34.5px;"></td>
					<td style='padding-top: 5px;'>
						<select id='coa-edit-lvl-5' name='coa-edit-lvl-5' class='form-control' required disabled>
						</select>
						<input type="hidden" id='coa-edit-lvl-5-input' name="coa-edit-lvl-5-input">
					</td>
				</tr>
				<!-- <tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Level 6</label></td>
					<td style='width: 40px;'><input id='edit-coa-dis-lvl6-code' class='form-control' type="text" name="lvl1_code" readonly style="width: 100%; text-align: center;"></td>
					<td style='padding-top: 5px;'>
						<select id='coa-edit-lvl-6' name='coa-edit-lvl-6' class='form-control' required disabled>
						</select>
						<input type="hidden" id='coa-edit-lvl-6-input' name="coa-edit-lvl-6-input">
					</td>
				</tr> -->
				
			</table>
			<div style='border-top: 1px solid #C1C1C1; margin-top: 15px; background-color: #F1F1F1; padding-bottom: 10px;'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Code</label></td>
						<td colspan='2' style='padding-top: 10px;'><input id='coa-edit-code' name='coa-edit-code' class='form-control' type='text' readonly style='text-align: center; background-color: #F9F9F9;' required>
						</td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Account Name</label></td>
						<td colspan='2' style='padding-top: 5px;'><input id='coa-edit-name' name='coa-edit-name' class='form-control no-space' type='text' style="text-align: center;" required>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<input type="hidden" id='coa-edit-id' name="coa-edit-id">
		<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px; width: 100%;'>
			<button class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>Ok</button>
		</div>
	</form>
</div>