<div class='side-body padding-top hide-table-setting'>
	<div class='card custom-card col-md-9 main-table-panel'>
		<div class='card-header'>
			<div class='card-title'>
				<div class='title'>Modes of Payment</div>
			</div>
		</div>
		<div class='card-body' style='padding: 0;'>
			<div class='row'>
				<div class='col-md-12' id='modes-of-payment-table-row'>
					<button type='button' id='add-mop' class='btn btn-info btn-sm btn-raised ripple-effect title' custom-title='Add'><i class='fa fa-plus'></i></button>
					<table id='modes-of-payment-table' class='table table-hovered table-bordered' style="min-width: 99.9%">
						<thead>
							<th></th>
							<th>Sequence</th>
							<th>Code</th>
							<th>Name</th>
							<th>Shortname</th>
							<th>Type</th>
						</thead>
					</table>
				</div>
			</div>
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
<div id='mop-type-select' style='display: none;'>
	<?php foreach($top_type as $top){?>
	<button class='btn btn-default select-option ripple-effect' style='width: 100%; margin-bottom: 0;' type-id='<?php echo $top->top_id;?>' type-code='<?php echo $top->top_code;?>' type='button'><?php echo $top->top_type;?></button>
	<?php }?>
</div>
<div id='mop-view-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 9px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">View Mode of Payment</h4>
	</div>
	<div class='view-body'>
		<div class='mop-modal-body'>
			<input id='mop-view-seq' type='text' style='border: none; float: right; width: 38px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px; text-align: left;' disabled>
			<label style='float: right;'>Sequence: </label>
			<table width='90%'>
				<tr>
					<td style='padding-top: 10px; width: 110px; text-align: right; padding-right: 20px;'><label>Code</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='mop-view-code' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; text-align: right; padding-right: 20px;'><label>Name</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='mop-view-name' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='mop-view-shortname' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; text-align: right; padding-right: 20px;'><label>Type</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='mop-view-type' class='form-control' type='text' placeholder='Select...' readonly></td>
				</tr>
			</table>
		</div>
		<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px; width: 100%;'>
			<button id='close-btn' class='btn btn-info btn-sm close-popover btn-raised ripple-effect' type='button' data-dismiss='modal' style='float: right;'>Close</button>
		</div>
	</div>
</div>
<div id='mop-add-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add Mode of Payment</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>docpro_settings/modes_of_payment/add' method='post' class='body'>
			<div class='modal-body'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 100px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control no-space' type='text' name='mop-add-name' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 5px;'><input class='form-control no-space' type='text' name='mop-add-shortname' required></td>
					</tr>
					<tr>
						<input type='hidden' name='mop-add-type-id'>
						<input type='hidden' name='mop-add-type-code'>
						<td style='padding-top: 5px; text-align: right; padding-right: 20px;'><label>Type</label></td>
						<td colspan='3' style='padding-top: 5px;'>
							<div class='input-group' style='width: 100%'>
								<input class='form-control required-readonly' type='text' name='mop-add-type' placeholder='Select...' required>
								<span type='button' class='input-group-addon mop-add-type-btn ripple-effect hand-pointer'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='mop-add-options' style='background-color: white; overflow-y: scroll;'>
	</div>
</div>
<div id='mop-edit-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Mode of Payment</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>docpro_settings/modes_of_payment/edit' method='post' class='body'>
			<div class='modal-body'>
				<input id='mop-edit-seq' type='text' style='border: none; float: right; width: 38px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px; text-align: left;' disabled>
				<label style='float: right;'>Sequence: </label>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 100px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='mop-edit-name' class='form-control no-space' type='text' name='mop-edit-name' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='mop-edit-shortname' class='form-control no-space' type='text' name='mop-edit-shortname' required></td>
					</tr>
					<tr>
						<input id='mop-edit-type-id' type='hidden' name='mop-edit-type-id'>
						<input id='mop-edit-type-code' type='hidden' name='mop-edit-type-code'>
						<td style='padding-top: 5px; text-align: right; padding-right: 20px;'><label>Type</label></td>
						<td colspan='3' style='padding-top: 5px;'>
							<div class='input-group' style='width: 100%'>
								<input id='mop-edit-type' class='form-control required-readonly' type='text' name='mop-edit-type' placeholder='Select...' required style="height: 36px;">
								<span type='button' class='input-group-addon mop-edit-type-btn hand-pointer'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<input type='hidden' id='mop-edit-id' name='mop-edit-id'>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='mop-edit-options' style='background-color: white; overflow-y: scroll;'>
	</div>
</div>
<div id='mop-update-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Update Mode of Payment</h4>
	</div>
	<div class='col-md-8'>
		<form action='<?php echo base_url(); ?>docpro_settings/modes_of_payment/update' method='post' class='body'>
			<div class='modal-body'>
				<input id='mop-update-seq' type='text' style='border: none; float: right; width: 36px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px; text-align: left;' disabled>
				<label style='float: right;'>Sequence: </label>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 100px; text-align: right; padding-right: 20px;'><label>Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='mop-update-name' class='form-control no-space' type='text' name='mop-update-name' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
						<td colspan='3' style='padding-top: 5px;'><input id='mop-update-shortname' class='form-control no-space' type='text' name='mop-update-shortname' required></td>
					</tr>
					<tr>
						<input id='mop-update-type-id' type='hidden' name='mop-update-type-id'>
						<input id='mop-update-type-code' type='hidden' name='mop-update-type-code'>
						<td style='padding-top: 5px; text-align: right; padding-right: 20px;'><label>Type</label></td>
						<td colspan='3' style='padding-top: 5px;'>
							<div class='input-group' style='width: 100%'>
								<input id='mop-update-type' class='form-control required-readonly' type='text' name='mop-update-type' placeholder='Select...' required style="height: 36px;">
								<span type='button' class='input-group-addon mop-update-type-btn hand-pointer'><i class='fa fa-caret-right'></i></span>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<input type="hidden" id='mop-update-id' name="mop-update-id">
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' data-dismiss='modal' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='mop-update-options' style='background-color: white; overflow-y: scroll;'>
	</div>
</div>
<!-- 
<div id='top-view-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">View Types of Payment</h4>
	</div>
	<div>
		<div class='body'>
			<div class='top-modal-body'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 100px; text-align: right; padding-right: 20px;'><label>Code</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='top-view-code' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 100px; text-align: right; padding-right: 20px;'><label>Type</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='top-view-type' class='form-control' type='text' readonly></td>
					</tr>
				</table>
			</div>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button id='close-btn' class='btn btn-info btn-sm btn-raised ripple-effect' type='button' style='float: right;'>Close</button>
			</div>
		</div>
	</div>
</div>
<div id='top-add-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add Types of Payment</h4>
	</div>
	<form action="<?php echo base_url(); ?>docpro_settings/top/add" method="post">
		<div>
			<div class='body'>
				<div class='top-modal-body'>
					<table width='90%'>
						<tr>
							<td style='padding-top: 10px; width: 100px; text-align: right; padding-right: 20px;'><label>Type</label></td>
							<td colspan='3' style='padding-top: 10px;'><input id='top-add-type' name='top-add-type' class='form-control' type='text'></td>
						</tr>
					</table>
				</div>
				<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
					<button id='close-btn' class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>Ok</button>
				</div>
			</div>
		</div>
	</form>
</div>
<div id='top-edit-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Types of Payment</h4>
	</div>
	<form action="<?php echo base_url(); ?>docpro_settings/top/edit" method='post'>
		<div>
			<div class='body'>
				<div class='top-modal-body'>
					<table width='90%'>
						<tr>
							<td style='padding-top: 10px; width: 100px; text-align: right; padding-right: 20px;'><label>Code</label></td>
							<td colspan='3' style='padding-top: 10px;'><input id='top-edit-code' class='form-control' type='text' readonly></td>
						</tr>
						<tr>
							<td style='padding-top: 10px; width: 100px; text-align: right; padding-right: 20px;'><label>Type</label></td>
							<td colspan='3' style='padding-top: 10px;'><input id='top-edit-type' name='top-edit-type' class='form-control' type='text'></td>
						</tr>
					</table>
				</div>
				<input type="hidden" id='top-edit-id' name="top-edit-id">
				<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
					<button id='close-btn' class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>Ok</button>
				</div>
			</div>
		</div>
	</form>
</div>
<div id='top-update-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Update Types of Payment</h4>
	</div>
	<form action="<?php echo base_url(); ?>docpro_settings/top/update" method='post'>
		<div>
			<div class='body'>
				<div class='top-modal-body'>
					<table width='90%'>
						<tr>
							<td style='padding-top: 10px; width: 100px; text-align: right; padding-right: 20px;'><label>Code</label></td>
							<td colspan='3' style='padding-top: 10px;'><input id='top-update-code' class='form-control' type='text' readonly></td>
						</tr>
						<tr>
							<td style='padding-top: 10px; width: 100px; text-align: right; padding-right: 20px;'><label>Type</label></td>
							<td colspan='3' style='padding-top: 10px;'><input id='top-update-type' name='top-update-type' class='form-control' type='text'></td>
						</tr>
					</table>
				</div>
				<input type="hidden" id='top-update-id' name="top-update-id">
				<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
					<button id='close-btn' class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>Ok</button>
				</div>
			</div>
		</div>
	</form>
</div> -->