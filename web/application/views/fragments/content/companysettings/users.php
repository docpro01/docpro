<div class='side-body padding-top'>
	<div class='card'>
		<div class='card-header'>
			<div class='card-title'>
				<div class='title'>Users</div>
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
				<div id='users-seq'>
					<ul class='seq-canvas'>
						<li>
							<div class='col-md-12'>
								<table id='users-summary-table' class='table table-bordered' style="min-width: 100%;">
									<thead>
										<th></th>
										<th>First Name</th>
										<th>Middle Name</th>
										<th>Last Name</th>
										<th>Address</th>
										<th>Contact Number</th>
										<th>Email</th>
									</thead>
								</table>
							</div>
						</li>
						<li>
							<button id='add' type='button' class='btn btn-info btn-sm btn-raised ripple-effect' style='margin-left: 15px;'><i class='fa fa-plus'></i></button>
							<div class='col-md-12' id='users-table-row'>
								<table id='users-table' class='table table-hovered table-bordered' style='min-width: 100%;'>
									<thead>
										<th>Options</th>
										<th>First Name</th>
										<th>Middle Name</th>
										<th>Last Name</th>
										<th>Address</th>
										<th>Contact Number</th>
										<th>Email</th>
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
<div id='u-company-select' style='display: none;'>
	<?php foreach($company_branches as $cb){ ?>
	<button class='btn btn-default select-option-company ripple-effect' cb-id='<?php echo $cb->cb_id; ?>' type='button' style='width: 100%'><h6><?php echo $cb->cb_name;?></h6></button>
	<?php }?>
</div>
<div id='u-user-type-select' style='display: none;'>
	<button class='btn btn-default select-option-user-type' type='button' style='width: 100%'>Super Admin</button>
	<button class='btn btn-default select-option-user-type' type='button' style='width: 100%'>Admin</button>
	<button class='btn btn-default select-option-user-type' type='button' style='width: 100%'>User</button>
</div>
<div id='add-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add User</h4>
	</div>
	<form action="<?php echo base_url(); ?>company_settings/users/add" method='post' class='body'>
		<div class='modal-body'>
			<table style="width: 90%; margin-left: 20px;">
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>First Name</label></td>
					<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-fname'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Middle Name</label></td>
					<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-mname'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Last Name</label></td>
					<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-lname'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 130px; text-align: right; padding-right: 20px;'><label>Address</label></td>
					<td colspan='3' style='padding-top: 10px;'><input class='form-control' type='text' name='add-address'></td>
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
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">View User</h4>
	</div>
		<div class='view-body'>
			<div class='view-modal-body'>
				<table width='90%'>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>First Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='view-fname' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Middle Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='view-mname' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Last Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='view-lname' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='view-address' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Contact Number</label></td>
						<td colspan='3' style='padding-top: 10px;'><input id='view-cno' class='form-control' type='text' readonly></td>
					</tr>
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Email</label></td>
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
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit User</h4>
	</div>
	<form action='<?php echo base_url(); ?>company_settings/users/edit' method='post' class='body'>
		<div class='modal-body'>
			<input id='edit-seq' type='text' style='border: none; float: right; width: 46px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px;' disabled>
			<label style='float: right;'>Sequence: </label>
			<table style="width: 90%; margin-left: 20px;">
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>First Name</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='edit-fname' class='form-control' type='text' name='edit-fname'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Middle Name</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='edit-mname' class='form-control' type='text' name='edit-mname'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Last Name</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='edit-lname' class='form-control' type='text' name='edit-lname'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='edit-address' class='form-control' type='text' name='edit-address'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Contact Number</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='edit-cno' class='form-control' type='text' name='edit-cno'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Email</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='edit-email' class='form-control' type='text' name='edit-email'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Username</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='edit-uname' class='form-control' type='text' name='edit-uname'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Password</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='edit-npass' class='form-control' type='password' name='edit-npass'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Re-Type Password</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='edit-rpass' class='form-control' type='password' name='edit-rpass'></td>
				</tr>
			</table>
		</div>
		<input type='hidden' id='edit-id' name='edit-id'>
		<input type='hidden' id='p-id' name='p-id'>
		<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
			<button class='btn btn-info btn-sm btn-raised ripple-effect submit' type='submit' style='float: right;'>OK</button>
		</div>
	</form>
</div>