<div class='side-body padding-top'>
	<div class='card'>
		<div class='card-header'>
			<div class='card-title'>
				<div class='title'>Products</div>
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
				<div id='products-seq'>
					<ul class='seq-canvas'>
						<li>
							<div class='col-md-12'>
								<table id='products-summary-table' class='table table-bordered' style='min-width: 100%;'>
									<thead>
										<th>Sequence</th>
										<th>Code</th>
										<th>Name</th>
										<th>Shortname</th>
										<th>Description</th>
										<th>Profit Cost Center</th>
										<th>Department</th>
									</thead>
								</table>
							</div>
						</li>
						<li>
							<button id='add' type='button' class='btn btn-info btn-sm btn-raised ripple-effect'><i class='fa fa-plus'></i></button>
							<div class='col-md-12' id='products-table-row'>
								<table id='products-table' class='table table-hovered table-bordered' style='min-width: 100%;'>
									<thead>
										<th>Options</th>
										<th>Sequence</th>
										<th>Code</th>
										<th>Name</th>
										<th>Shortname</th>
										<th>Description</th>
										<th>Profit Cost Center</th>
										<th>Department</th>
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
<div id='p-profit-cost-center-select' style='display: none;'>
	<?php foreach($co_profit_cost_center as $co_pcc){?>
	<button class='btn btn-default select-option-profit-cost-center ripple-effect' profit-cost-center-id='<?php echo $co_pcc->co_pcc_id;?>' profit-cost-center-code='<?php echo $co_pcc->co_pcc_code;?>' type='button' style='width: 100%'><?php echo $co_pcc->co_pcc_name;?></button>
	<?php }?>
</div>
<div id='p-department-select' style='display: none;'>
	<?php foreach($co_department as $co_dept){?>
	<button class='btn btn-default select-option-department ripple-effect' department-id='<?php echo $co_dept->co_de_id;?>' department-code='<?php echo $co_dept->co_de_code;?>' type='button' style='width: 100%'><?php echo $co_dept->co_de_name;?></button>
	<?php }?>
</div>
<div id='add-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add Product</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>company_settings/products/add' method='post' class='body'>
			<div class='modal-body'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-name'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-shortname'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Description</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-description'></td>
					</tr>
					<tr>
						<input type='hidden' name='add-department-id'>
						<input type='hidden' name='add-department-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Department</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' name='add-department' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon add-department-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type='hidden' name='add-profit-cost-center-id'>
						<input type='hidden' name='add-profit-cost-center-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px; padding-left: 9px;'><label>Profit Cost Center</label></td>
						<td colspan='3'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' name='add-profit-cost-center' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon add-profit-cost-center-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
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
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">View Product</h4>
	</div>
	<div>
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
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='view-name' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='view-shortname' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Description</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='view-description' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Department</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input id='view-department' class='form-control' type='text' placeholder='Select...' readonly>
							</div>
						</td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px; padding-left: 9px;'><label>Profit Cost Center</label></td>
						<td colspan='3'>
							<div class='input-group' style='width: 100%'>
								<input id='view-profit-cost-center' class='form-control' type='text' placeholder='Select...' readonly>
							</div>
						</td>
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
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Product</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>company_settings/products/edit' method='post' class='body'>
			<div class='modal-body'>
				<input id='edit-seq' type='text' style='border: none; float: right; width: 46px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px;' disabled>
				<label style='float: right;'>Sequence: </label>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='edit-name' class='form-control' type='text' name='edit-name'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='edit-shortname' class='form-control' type='text' name='edit-shortname'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Description</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='edit-description' class='form-control' type='text' name='edit-description'></td>
					</tr>
					<tr>
						<input id='edit-department-id' type='hidden' name='edit-department-id'>
						<input id='edit-department-code' type='hidden' name='edit-department-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Department</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input id='edit-department' class='form-control' type='text' name='edit-department' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon edit-department-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input id='edit-profit-cost-center-id' type='hidden' name='edit-profit-cost-center-id'>
						<input id='edit-profit-cost-center-code' type='hidden' name='edit-profit-cost-center-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px; padding-left: 9px;'><label>Profit Cost Center</label></td>
						<td colspan='3'>
							<div class='input-group' style='width: 100%'>
								<input id='edit-profit-cost-center' class='form-control' type='text' name='edit-profit-cost-center' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon edit-profit-cost-center-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<input type='hidden' id='edit-id' name='edit-id' value=''>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='edit-options'style='background-color: white; overflow-y: scroll;'>
	</div>
</div>
<div id='update-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Update Product</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>company_settings/products/update' method='post' class='body'>
			<div class='modal-body'>
				<input id='update-seq' type='text' style='border: none; float: right; width: 46px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px;' disabled>
				<label style='float: right;'>Sequence: </label>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='update-name' class='form-control' type='text' name='update-name'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='update-shortname' class='form-control' type='text' name='update-shortname'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Description</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='update-description' class='form-control' type='text' name='update-description'></td>
					</tr>
					<tr>
						<input id='update-department-id' type='hidden' name='update-department-id'>
						<input id='update-department-code' type='hidden' name='update-department-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Department</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input id='update-department' class='form-control' type='text' name='update-department' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon update-department-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input id='update-profit-cost-center-id' type='hidden' name='update-profit-cost-center-id'>
						<input id='update-profit-cost-center-code' type='hidden' name='update-profit-cost-center-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px; padding-left: 9px;'><label>Profit Cost Center</label></td>
						<td colspan='3'>
							<div class='input-group' style='width: 100%'>
								<input id='update-profit-cost-center' class='form-control' type='text' name='update-profit-cost-center' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon update-profit-cost-center-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<input type='hidden' id='update-id' name='update-id' value=''>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>OK</button>
			</div>
		</form>	
	</div>
	<div class='col-md-4' id='update-options' style='background-color: white; overflow-y: scroll;'>
	</div>
</div>