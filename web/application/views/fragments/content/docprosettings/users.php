<div class='side-body padding-top hide-table-setting'>
	<div class='card custom-card col-md-9 main-table-panel'>
		<div class='card-header'>
			<div class='card-title'>
				<div class='title'>Users</div>
			</div>
		</div>
		<div class='card-body' style='padding: 0;'>
			<button id='add' type='button' class='btn btn-info btn-sm btn-raised ripple-effect title' custom-title='Add'><i class='fa fa-plus'></i></button>
			<div class='row'>
				<div class='col-md-12' id='users-table-row'>
					<table id='users-table' class='table table-hovered table-bordered' style='min-width: 99.8%;'>
						<thead>
							<th></th>
							<th>Sequence</th>
							<th>Name</th>
							<th>Home Address</th>
							<th>Contact Number</th>
							<th>Email Address</th>
							<th>Username</th>
							<th>Access Level</th>
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
<div id='u-user-type-select' style='display: none;'>
	<button class='btn btn-default select-option-user-type ripple-effect' type='button' style='width: 100%; margin-bottom: 0;'>Super Admin</button>
	<button class='btn btn-default select-option-user-type ripple-effect' type='button' style='width: 100%; margin-bottom: 0;'>Admin</button>
	<button class='btn btn-default select-option-user-type ripple-effect' type='button' style='width: 100%; margin-bottom: 0;'>User</button>
</div>
<div id='add-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add User</h4>
	</div>
	<div class='col-md-8'>
		<form action="<?php echo base_url(); ?>docpro_settings/users/add" method='post' class='body'>
			<div class='modal-body'>
				<table style="width: 90%; margin-left: 20px;">
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>First Name</label></td>
						<td colspan='3' style='padding-top: 10px;'><input class='form-control no-space' type='text' name='add-fname' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Middle Name</label></td>
						<td colspan='3' style='padding-top: 5px;'><input class='form-control no-space' type='text' name='add-mname' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Last Name</label></td>
						<td colspan='3' style='padding-top: 5px;'><input class='form-control no-space' type='text' name='add-lname' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
						<td colspan='3' style='padding-top: 5px;'><input class='form-control no-space' type='text' name='add-address' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Contact Number</label></td>
						<td colspan='3' style='padding-top: 5px;'><input class='form-control no-space number' type='text' name='add-cno' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Email</label></td>
						<td colspan='3' style='padding-top: 5px;'><input class='form-control no-space' type='email' name='add-email' required></td>
					</tr>
				</table>
				<div style="border-top: 1px solid #C1C1C1; margin-top: 15px; background-color: #F1F1F1; padding-bottom: 10px;">
					<table style="width: 90%; margin-left: 20px;">
						<tr>
							<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Username</label></td>
							<td colspan='3' style='padding-top: 10px;'>
							<span id='add-username-notif' style='font-size: 10px; color: red; display: none;'><i class='fa fa-warning'></i>&nbsp; Username already taken!</span>
							<input class='form-control no-space add-username' type='text' name='add-username' required>
							</td>
						</tr>
						<tr>
							<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Password</label></td>
							<td colspan='3' style='padding-top: 5px;'><input class='form-control add-password1' type='password' name='add-password' required></td>
						</tr>
						<tr>
							<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Re-Type Password</label></td>
							<td colspan='3' style='padding-top: 5px;'>
							<span id='add-password-match' style='color: red; font-size: 10px; display: none;'><i class='fa fa-warning'></i>&nbsp; Password doesn't match!</span>
							<input class='form-control add-password2' type='password' name='add-r-password' required>
							</td>
						</tr>
						<tr>
							<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Access Level</label></td>
							<td colspan='3' style='padding-top: 5px;'>
								<div class='input-group' style='width: 100%'>
									<input class='form-control required-readonly' type='text' name='add-user-type' placeholder='Select...' required>
									<span type='button' class='input-group-addon add-user-type-btn hand-pointer ripple-effect'><i class='fa fa-caret-right'></i></span>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button id='add-submit' class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>Ok</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='add-options' style='background-color: white; overflow-y: scroll;'>
	</div>
</div>
<div id='view-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 9px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">View User</h4>
	</div>
	<div class='view-body'>
		<div class='modal-body'>
			<input id='view-seq' type='text' style='border: none; float: right; width: 46px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px; text-align: left;' disabled>
			<label style='float: right;'>Sequence: </label>
			<table width='90%'>
				<tr>
					<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>First Name</label></td>
					<td colspan='3' style='padding-top: 10px;'><input id='view-fname' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Middle Name</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-mname' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Last Name</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-lname' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-address' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Contact Number</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-cno' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Email</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-email' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Username</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-username' class='form-control' type='text' readonly></td>
				</tr>
				<tr>
					<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Access Level</label></td>
					<td colspan='3' style='padding-top: 5px;'><input id='view-user-type' class='form-control' type='text' placeholder='Select...' readonly>
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
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit User</h4>
	</div>
	<div class='col-md-8'>
		<form action="<?php echo base_url(); ?>docpro_settings/users/edit" method='post' class='body'>
			<div class='modal-body'>
				<input id='edit-seq' type='text' style='border: none; float: right; width: 20px; padding-top: 2px; font-weight: bold; background-color: white; margin-right: 23px; padding-left: 3px; text-align: left;' disabled>
				<label style='float: right;'>Sequence: </label>
				<table style="width: 90%; margin-left: 20px;">
					<tr>
						<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>First Name</label></td>
						<td style='padding-top: 10px;'><input id='edit-fname' class='form-control no-space' type='text' name='edit-fname' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Middle Name</label></td>
						<td style='padding-top: 5px;'><input id='edit-mname' class='form-control no-space' type='text' name='edit-mname' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Last Name</label></td>
						<td style='padding-top: 5px;'><input id='edit-lname' class='form-control no-space' type='text' name='edit-lname' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
						<td style='padding-top: 5px;'><input id='edit-address' class='form-control no-space' type='text' name='edit-address' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Contact Number</label></td>
						<td style='padding-top: 5px;'><input id='edit-cno' class='form-control no-space' type='text' name='edit-cno' required></td>
					</tr>
					<tr>
						<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Email</label></td>
						<td style='padding-top: 5px;'><input id='edit-email' class='form-control no-space' type='text' name='edit-email' required></td>
					</tr>
				</table>
				<div style="border-top: 1px solid #C1C1C1; margin-top: 15px; background-color: #F1F1F1; padding-bottom: 10px;">
					<table style='width: 90%; margin-left: 20px;'>
						<tr>
							<td style='padding-top: 10px; width: 150px; text-align: right; padding-right: 20px;'><label>Username</label></td>
							<td style='padding-top: 10px;'>
							<span id='edit-username-notif' style='font-size: 10px; color: red; display: none;'><i class='fa fa-warning'></i>&nbsp; Username already taken!</span>
							<input id='edit-uname' class='form-control no-space edit-username' type='text' name='edit-uname' required>
							</td>
						</tr>
						<tr>
							<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>New Password</label></td>
							<td style='padding-top: 5px;'><input id='edit-npass' class='form-control edit-password1' type='password' name='edit-npass'></td>
						</tr>
						<tr>
							<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Re-Type Password</label></td>
							<td style='padding-top: 5px;'>
							<span id='edit-password-match' style='color: red; font-size: 10px; display: none;'><i class='fa fa-warning'></i>&nbsp; Password doesn't match!</span>
							<input id='edit-rpass' class='form-control edit-password2' type='password' name='edit-rpass'>
							</td>
						</tr>
						<tr>
							<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Access Level</label></td>
							<td colspan='3' style='padding-top: 5px;'>
								<div class='input-group' style='width: 100%'>
									<input id='edit-user-type' class='form-control required-readonly' type='text' name='edit-user-type' placeholder='Select...' required>
									<span type='button' class='input-group-addon edit-user-type-btn hand-pointer ripple-effect'><i class='fa fa-caret-right'></i></span>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<input type='hidden' id='edit-id' name='edit-id'>
			<input type='hidden' id='p-id' name='p-id'>
			<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
				<button id='edit-submit' class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>OK</button>
			</div>
		</form>
	</div>
	<div class='col-md-4' id='edit-options' style='background-color: white; overflow-y: scroll;'>
	</div>
</div>