<div class='side-body padding-top'>
	<div class='card'>
		<div class='card-header'>
			<div class='card-title'>
				<div class='title'>Business Partners</div>
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
				<div id='bp-seq'>
					<ul class='seq-canvas'>
						<li>
							<div class='col-md-12'>
								<table id='business-partners-summary-table' class='table table-bordered' style='min-width: 100%;'>
									<thead>
										<th>Sequence</th>
										<th>Code</th>
										<th>Name</th>
										<th>Shortname</th>
										<th>Style</th>
										<th>Address</th>
										<th>TIN</th>
										<th>Particulars</th>
										<th>Class</th>
										<th>Type</th>
									</thead>
								</table>
							</div>
						</li>
						<li>
							<button id='add' type='button' class='btn btn-info btn-sm btn-raised ripple-effect'><i class='fa fa-plus'></i></button>
							<div class='col-md-12' id='business-partners-table-row'>
								<table id='business-partners-table' class='table table-hovered table-bordered' style='min-width: 100%;'>
									<thead>
										<th>Opts.</th>
										<th>Sequence</th>
										<th>Code</th>
										<th>Name</th>
										<th>Shortname</th>
										<th>Style</th>
										<th>Address</th>
										<th>TIN</th>
										<th>Particulars</th>
										<th>Class</th>
										<th>Type</th>
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
<div id='bp-class-select' style='display: none;'>
	<?php foreach($bpc_class as $bpc){?>
	<button class='btn btn-default select-option-class ripple-effect' bpc-id='<?php echo $bpc->bpc_id;?>'  bpc-code='<?php echo $bpc->bpc_code;?>' bpc-class='<?php echo $bpc->bpc_class; ?>' type='button' style='width: 100%'><?php echo $bpc->bpc_class;?></button>
	<?php }?>
</div>
<div id='bp-type-select' style='display: none;'>
	<?php foreach($bpt_type as $bpt){?>
	<button class='btn btn-default select-option-type ripple-effect' type-id='<?php echo $bpt->bpt_id;?>'  type-code='<?php echo $bpt->bpt_code;?>' type-name='<?php echo $bpt->bpt_type;?>' type='button' style='width: 100%'><?php echo $bpt->bpt_type;?></button>
	<?php }?>
</div>
<div id='tax-select-1' style='display: none;'>
	<?php foreach($taxes as $tax){?>
	<button class='btn btn-default select-option-tax-1 ripple-effect' tax-id='<?php echo $tax->t_id; ?>'  tax-code='<?php echo $tax->t_code; ?>' tax-name='<?php echo $tax->t_name; ?>' tax-shortname='<?php echo $tax->t_shortname; ?>' tax-rate='<?php echo $tax->t_rate; ?>' tax-base='<?php echo $tax->t_base; ?>' tax-type='<?php echo $tax->tt_name; ?>' type='button' style='width: 100%'><?php echo $tax->t_name;?></button>
	<?php }?>
</div>
<div id='tax-select-2' style='display: none;'>
	<?php foreach($taxes as $tax){?>
	<button class='btn btn-default select-option-tax-2 ripple-effect' tax-id='<?php echo $tax->t_id; ?>'  tax-code='<?php echo $tax->t_code; ?>' tax-name='<?php echo $tax->t_name; ?>' tax-shortname='<?php echo $tax->t_shortname; ?>' tax-rate='<?php echo $tax->t_rate; ?>' tax-base='<?php echo $tax->t_base; ?>' tax-type='<?php echo $tax->tt_name; ?>' type='button' style='width: 100%'><?php echo $tax->t_name;?></button>
	<?php }?>
</div>
<div id='tax-select-3' style='display: none;'>
	<?php foreach($taxes as $tax){?>
	<button class='btn btn-default select-option-tax-3 ripple-effect' tax-id='<?php echo $tax->t_id; ?>'  tax-code='<?php echo $tax->t_code; ?>' tax-name='<?php echo $tax->t_name; ?>' tax-shortname='<?php echo $tax->t_shortname; ?>' tax-rate='<?php echo $tax->t_rate; ?>' tax-base='<?php echo $tax->t_base; ?>' tax-type='<?php echo $tax->tt_name; ?>' type='button' style='width: 100%'><?php echo $tax->t_name;?></button>
	<?php }?>
</div>
<div id='add-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add Business Partner</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>company_settings/business_partners/add' method='post' class='body'>
			<div class='modal-body'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-name'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Individual Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-ind-name'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-shortname'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Style</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-style'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-address'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>TIN</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-tin'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Particulars</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-particulars'></td>
					</tr>
					<tr>
						<input type='hidden' name='add-class-id'>
						<input type='hidden' name='add-class-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Classification</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' name='add-class' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon add-class-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type='hidden' name='add-type-id'>
						<input type='hidden' name='add-type-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Type</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' name='add-type' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon add-type-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type='hidden' name='add-tax-1-id'>
						<input type='hidden' name='add-tax-1-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Tax 1</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' name='add-tax-1' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon add-tax-1-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type='hidden' name='add-tax-2-id'>
						<input type='hidden' name='add-tax-2-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Tax 2</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' name='add-tax-2' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon add-tax-2-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type='hidden' name='add-tax-3-id'>
						<input type='hidden' name='add-tax-3-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Tax 3</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' name='add-tax-3' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon add-tax-3-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>Ok</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='add-options' style='background-color: white; overflow-y: scroll;'>
	</div>
</div>
<div id='view-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 9px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">View Business Partner</h4>
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
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-name' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-shortname' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Style</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-style' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-address' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>TIN</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-tin' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Particulars</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-particulars' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Class</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-class' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Type</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-type' class='form-control' type='text' readonly>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Tax 1</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-tax-1' class='form-control' type='text' readonly>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Tax 2</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-tax-2' class='form-control' type='text' readonly>
					</td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Tax 3</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-tax-3' class='form-control' type='text' readonly>
					</td>
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
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Business Partner</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>company_settings/business_partners/edit' method='post' class='body'>
			<div class='modal-body'>
				<input id='edit-seq' type='text' style='border: none; float: right; width: 46px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px;' disabled>
				<label style='float: right;'>Sequence: </label>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='edit-name' class='form-control' type='text' name='edit-name'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Individual Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='edit-ind-name' class='form-control' type='text' name='edit-ind-name'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='edit-shortname' class='form-control' type='text' name='edit-shortname'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Style</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='edit-style' class='form-control' type='text' name='edit-style'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='edit-address' class='form-control' type='text' name='edit-address'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>TIN</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='edit-tin' class='form-control' type='text' name='edit-tin'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Particulars</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='edit-particulars' class='form-control' type='text' name='edit-particulars'></td>
					</tr>
					<tr>
						<input type='hidden' id='edit-class-id' name='edit-class-id'>
						<input type='hidden' id='edit-class-code' name='edit-class-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Classification</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' id='edit-class' name='edit-class' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon edit-class-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type='hidden' id='edit-type-id' name='edit-type-id'>
						<input type='hidden' id='edit-type-code' name='edit-type-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Type</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' id='edit-type' name='edit-type' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon edit-type-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type='hidden' id='edit-tax-1-id' name='edit-tax-1-id'>
						<input type='hidden' id='edit-tax-1-code' name='edit-tax-1-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Tax 1</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' id='edit-tax-1' name='edit-tax-1' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon edit-tax-1-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type='hidden' id='edit-tax-2-id' name='edit-tax-2-id'>
						<input type='hidden' id='edit-tax-2-code' name='edit-tax-2-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Tax 2</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' id='edit-tax-2' name='edit-tax-2' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon edit-tax-2-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type='hidden' id='edit-tax-3-id' name='edit-tax-3-id'>
						<input type='hidden' id='edit-tax-3-code' name='edit-tax-3-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Tax 3</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' id='edit-tax-3' name='edit-tax-3' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon edit-tax-3-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<input type='hidden' id='edit-id' name='edit-id'>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='edit-options' style='background-color: white; overflow-y: scroll;'>
	</div>
</div>
<div id='update-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Update Business Partner</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>company_settings/business_partners/update' method='post' class='body'>
			<div class='modal-body'>
				<input id='update-seq' type='text' style='border: none; float: right; width: 46px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px;' disabled>
				<label style='float: right;'>Sequence: </label>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='update-name' class='form-control' type='text' name='update-name'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Individual Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='update-ind-name' class='form-control' type='text' name='update-ind-name'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='update-shortname' class='form-control' type='text' name='update-shortname'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Style</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='update-style' class='form-control' type='text' name='update-style'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='update-address' class='form-control' type='text' name='update-address'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>TIN</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='update-tin' class='form-control' type='text' name='update-tin'></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Particulars</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='update-particulars' class='form-control' type='text' name='update-particulars'></td>
					</tr>
					<tr>
						<input type='hidden' id='update-class-id' name='update-class-id'>
						<input type='hidden' id='update-class-code' name='update-class-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Classification</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' id='update-class' name='update-class' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon update-class-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type='hidden' id='update-type-id' name='update-type-id'>
						<input type='hidden' id='update-type-code' name='update-type-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Type</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' id='update-type' name='update-type' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon update-type-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type='hidden' id='update-tax-1-id' name='update-tax-1-id'>
						<input type='hidden' id='update-tax-1-code' name='update-tax-1-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Tax 1</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' id='update-tax-1' name='update-tax-1' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon update-tax-1-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type='hidden' id='update-tax-2-id' name='update-tax-2-id'>
						<input type='hidden' id='update-tax-2-code' name='update-tax-2-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Tax 2</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' id='update-tax-2' name='update-tax-2' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon update-tax-2-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type='hidden' id='update-tax-3-id' name='update-tax-3-id'>
						<input type='hidden' id='update-tax-3-code' name='update-tax-3-code'>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Tax 3</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control' type='text' id='update-tax-3' name='update-tax-3' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon update-tax-3-btn'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<input type='hidden' id='update-id' name='update-id'>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='update-options' style='background-color: white;  overflow-y: scroll;'>
	</div>
</div>