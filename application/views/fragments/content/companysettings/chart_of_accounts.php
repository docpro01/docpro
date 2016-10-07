<div class='side-body padding-top'>
	<div class='card'>
		<div class='card-header'>
			<div class='card-title'>
				<div class='title'>Chart of Accounts</div>
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
				<div id='coa-seq'>
					<ul class='seq-canvas'>
						<li>
							<div class='col-md-12'>
								<table id='chart-of-accounts-summary-table' class='table table-bordered' style='min-width: 100%;'>
									<thead>
										<th>Code</th>
										<th>Name</th>
										<th>BIR Classification</th>
									</thead>
								</table>
							</div>
						</li>
						<li>
							<button id='add' type='button' class='btn btn-info btn-sm btn-raised ripple-effect title' custom-title='Add'><i class='fa fa-plus'></i></button>
							<div class='col-md-12' id='company-table-row'>
								<table id='chart-of-accounts-table' class='table table-hovered table-bordered' style='min-width: 100%;'>
									<thead>
										<th>Options</th>
										<th>Code</th>
										<th>Name</th>
										<th>BIR Classification</th>
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
<div id='add-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add COA</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>company_settings/banks/add' method='post' class='body'>
			<div class='modal-body'>
				<table width='90%'>
					<tr>
						<input type="hidden" name="lvl_1_id">
						<input type="hidden" name="lvl_1_code">
						<input type="hidden" name="lvl_1_name">
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Category 1</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input id='cat-1' class='form-control' type='text' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon btn-cat-1'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type="hidden" name="lvl_2_id">
						<input type="hidden" name="lvl_2_code">
						<input type="hidden" name="lvl_2_name">
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Category 2</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input id='cat-2' class='form-control' type='text' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon btn-cat-2'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type="hidden" name="lvl_3_id">
						<input type="hidden" name="lvl_3_code">
						<input type="hidden" name="lvl_3_name">
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Category 3</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input id='cat-3' class='form-control' type='text' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon btn-cat-3'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<input type="hidden" name="lvl_4_id">
						<input type="hidden" name="lvl_4_code">
						<input type="hidden" name="lvl_4_name">
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Category 4</label></td>
						<td colspan='3' style='padding-top: 10px;'>
							<div class='input-group' style='width: 100%'>
								<input id='cat-4' class='form-control' type='text' placeholder='Select...' readonly>
								<span type='button' class='input-group-addon btn-cat-4'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>BIR Classification</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text'></td>
					</tr>
				</table>
			</div>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='add-cat-option' style='background-color: white; overflow-y: scroll;'>
	</div>
</div>