<!-- LOADER -->
<div id='loader' class="modal show" tabindex="-1" role="dialog" style="background-color: #FFF;">
  	<div class='col-md-12' style='text-align: center; margin-top: 10%;'>
		<h3>Loading</h3>
		<div id="fountainG">
			<div id="fountainG_1" class="fountainG"></div>
			<div id="fountainG_2" class="fountainG"></div>
			<div id="fountainG_3" class="fountainG"></div>
			<div id="fountainG_4" class="fountainG"></div>
			<div id="fountainG_5" class="fountainG"></div>
			<div id="fountainG_6" class="fountainG"></div>
			<div id="fountainG_7" class="fountainG"></div>
			<div id="fountainG_8" class="fountainG"></div>
		</div>
	</div>
</div>

<div id='setup-banner'>
	<span style="font-weight: bold; margin-left: 10%;">DocPro Business Solutions</span>
	<span class='demo' style="margin-right: 10%; float: right;"><span class='demo2'><p id='bookkeeping'>Bookkeeping System</p></span></span>
</div>
<div id='setup-logo' class='logo'>
	<img src="<?php echo base_url() ?>assets/img/logo_setup.png" style='width: 150px;'>
</div>
<h1 style="text-align: center; font-weight: bold;">Setup</h1>
<div class='container'>
	<div class='row'>
		<div class='col-md-12' style="text-align: center;">
			<div id='content' class="side-body padding-top" ng-app='myApp' ng-controller='myCtrl'>
				<div class='card'>
					<div class='card-body' style="padding-top: 10px;">
						<div id='setup-nav' class='col-md-12'>
							<div id='setup-tab-1' class='setup-tab col-md-3 active' style="float: left;">
								<button type='button' class='go_to_seq_1 btn btn-default btn-sm btn-flat ripple-effect btn-seq seq-selected'>
									Company
								</button>
							</div>
							<div id='setup-tab-2' class='setup-tab col-md-3' style="float: left;">
								<button type='button' class='go_to_seq_2 btn btn-default btn-sm btn-flat ripple-effect btn-seq seq-selected'>
									Administration
								</button>
							</div>
							<div id='setup-tab-3' class='setup-tab col-md-3' style="float: left;">
								<button class='go_to_seq_3 btn btn-default btn-sm btn-flat ripple-effect btn-seq seq-selected'>
									COA
								</button>
							</div>
							<div id='setup-tab-4' class='setup-tab col-md-3' style="float: left;">
								<button class='go_to_seq_4 btn btn-default btn-sm btn-flat ripple-effect btn-seq seq-selected'>
									Taxes
								</button>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-12' style="margin-top: 35px; padding: 0;">
								<div id="sequence1">
									<ul class='seq-canvas'>
										<li id='setup-1' setup-title='Company Profile' class='setup-1'>
											<div class='content'> 
												<div class="row">
													<div class='col-xs-12' style="margin-top: 20px; padding: 20px 0;">
														<h3 style="text-align: left; font-size: 16px; font-weight: bold; margin-bottom: 25px;"><i class='fa fa-caret-right'></i>&nbsp; Profile</h3>
														<div class='col-md-12'>
															<table id='profile-table' class='table table-bordered' style="width: 100%;">
																<thead>
																	<th></th>
																	<th>Company Name</th>
																	<th>Individual Name</th>
																	<th>Address</th>
																	<th>Tax Type</th>
																	<th>TIN</th>
																	<th>Mobile number</th>
																	<th>Email</th>
																</thead>
															</table>
														</div>
													</div>
													<div class='col-xs-12' style="margin-top: 20px; padding: 20px 0;">
														<h3 style="text-align: left; font-size: 16px; font-weight: bold; margin-bottom: 25px;"><i class='fa fa-caret-right'></i>&nbsp; Branches</h3>
														<div class='col-md-12'>
															<button id='add-branch-btn' type='button' class='btn btn-info btn-sm btn-raised ripple-effect title' custom-title='Add Branch' style="float: left;">Add</button>
															<table id='branch-table' class='table table-bordered' style="width: 100%;">
																<thead>
																	<th style='width: 45px;'></th>
																	<th>Branch Name</th>
																	<th>Address</th>
																	<th>TIN</th>
																	<th>Contact Number</th>
																	<th>Email Address</th>
																</thead>
															</table>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class='col-md-6' style="padding: 0;">
													</div>
													<div class='col-md-6' style="padding: 0;">
														<button type="button" class="go_to_seq_2 setup-next btn btn-info btn-raised ripple-effect" aria-label="Next">
															NEXT
														</button>
													</div>
												</div>
											</div>
										</li>		
										<li id='setup-2' setup-title='Administration' class='setup-1'>
											<div class='content'> 
												<div class="row">
													<div class='col-xs-12' style="border-top: 1px solid #E8E8E8; margin-top: 20px; padding: 20px 0;">
														<h3 style="text-align: left; font-size: 16px; font-weight: bold; margin-bottom: 25px;"><i class='fa fa-caret-right'></i>&nbsp; Users</h3>
														<div class='col-md-12'>
															<button id='add-user-btn' type='button' class='btn btn-info btn-sm btn-raised ripple-effect title' custom-title='Add User' style="float: left;">Add</button>
															<table id='users-table' class='table table-bordered' style="width: 100%;">
																<thead>
																	<th style="width: 45px;"></th>
																	<th>Name</th>
																	<th>Address</th>
																	<th>Contact Number</th>
																	<th>Email Address</th>
																	<th>Branch</th>
																	<th>Username</th>
																	<th>Validity Date</th>
																</thead>
															</table>
														</div>
													</div>

													<!-- <div class='col-xs-12'>
														<div class='table-wrapper' style="margin-bottom: 30px;">
															<table id='admin-users' class='table table-bordered' style="width: 100%;">
																<thead>
																	<th></th>
																	<th>First Name</th>
																	<th>Middle Name</th>
																	<th>Last Name</th>
																</thead>
																<tbody>
																	
																</tbody>
															</table>
														</div>
													</div> -->
												</div>		
												<div class='row'>
													<div class='col-md-6' style="padding: 0;">
														<button type="button" class="go_to_seq_1 setup-prev btn btn-info btn-raised ripple-effect" aria-label="Previous">Prev</button>	  
													</div>
													<div class='col-md-6' style="padding: 0;">
														<button type="button" class="go_to_seq_3 setup-next btn btn-info btn-raised ripple-effect" aria-label="Next">Next</button>
													</div>
												</div>						
											</div>
										</li>
										<li id='setup-3' setup-title='Chart of Accounts' class='setup-2'>
											<div class='content' style='width: 96%;'> 
												<div class="row">
													<div class='col-md-12'>
														<div class='row'>
															<div id='coa-tab-1' class='coa-tab active'>
																<button type='button' class='btn btn-default btn-sm btn-flat ripple-effect btn-seq seq-selected set-1'>
																	<span>Level 1</span>
																</button>
															</div>
															<div id='coa-tab-2' class='coa-tab'>
																<button type='button' class='btn btn-default btn-sm btn-flat ripple-effect btn-seq set-2'>
																	<span>Level 2</span>
																</button>
															</div>
															<div id='coa-tab-3' class='coa-tab'>
																<button type='button' class='btn btn-default btn-sm btn-flat ripple-effect btn-seq set-3'>
																	<span>Level 3</span>
																</button>
															</div>
															<div id='coa-tab-4' class='coa-tab'>
																<button type='button' class='btn btn-default btn-sm btn-flat ripple-effect btn-seq set-4'>
																	<span>Level 4</span>
																</button>
															</div>
															<div id='coa-tab-5' class='coa-tab'>
																<button type='button' class='btn btn-default btn-sm btn-flat ripple-effect btn-seq set-5'>
																	<span>Level 5</span>
																</button>
															</div>
															<div id='coa-tab-6' class='coa-tab'>
																<button type='button' class='btn btn-default btn-sm btn-flat ripple-effect btn-seq set-6'>
																	<span>Level 6</span>
																</button>
															</div>
														</div>
													</div>
													<div class='col-md-12' style='min-height: 300px; margin-bottom: 10px;'>
														<div class='scrollable-div'>
															<div id='coa-seq'>
																<ul class='seq-canvas'>
																	<li>
																		<div class='col-md-8 col-md-offset-2' style='margin-top: 25px;'>
																			<table id='coa-lvl1' class='table table-bordered' style="width: 100%;">
																				<thead>
																					<th>Code</th>
																					<th>Name</th>
																				</thead>
																			</table>
																		</div>
																	</li>
																	<li>
																		<div class='col-md-8 col-md-offset-2' style='margin-top: 25px;'>
																			<table id='coa-lvl2' class='table table-bordered' style="width: 100%;">
																				<thead>
																					<th>Code</th>
																					<th>Name</th>
																				</thead>
																			</table>
																		</div>
																	</li>
																	<li>
																		<div class='col-md-8 col-md-offset-2' style='margin-top: 25px;'>
																			<table id='coa-lvl3' class='table table-bordered' style="width: 100%;">
																				<thead>
																					<th>Code</th>
																					<th>Name</th>
																					<th>BIR</th>
																				</thead>
																			</table>
																		</div>
																	</li>
																	<li>
																		<div class='col-md-8 col-md-offset-2' style='margin-top: 25px;'>
																			<table id='coa-lvl4' class='table table-bordered' style="width: 100%;">
																				<thead>
																					<th>Code</th>
																					<th>Name</th>
																				</thead>
																			</table>
																		</div>
																	</li>
																	<li>
																		<div class='col-md-8 col-md-offset-2' style='margin-top: 25px;'>
																			<button id='add-lvl-5-btn' type='button' class='btn btn-info btn-sm btn-raised ripple-effect' style='float: left; z-index: 9999999;'>Add</button>
																			<table id='coa-lvl5' class='table table-bordered' style="width: 100%;">
																				<thead>
																					<th></th>
																					<th>Code</th>
																					<th>Name</th>
																				</thead>
																			</table>
																		</div>
																	</li>
																	<li>
																		<div class='col-md-8 col-md-offset-2' style='margin-top: 25px;'>
																			<button id='add-lvl-6-btn' type='button' class='btn btn-info btn-sm btn-raised ripple-effect' style='float: left; z-index: 9999999;'>Add</button>
																			<table id='coa-lvl6' class='table table-bordered' style="width: 100%;">
																				<thead>
																					<th></th>
																					<th>Code</th>
																					<th>Name</th>
																				</thead>
																			</table>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class='col-md-6' style="padding: 0;">
														<button type="button" class="go_to_seq_2 setup-prev btn btn-info btn-raised ripple-effect" aria-label="Previous">Prev</button>	  
													</div>
													<div class='col-md-6' style="padding: 0;">
														<button type="button" class="go_to_seq_4 setup-next btn btn-info btn-raised ripple-effect" aria-label="Next">Next</button>
													</div>
												</div>
											</div>
										</li>														
										<li id='setup-4' setup-title='Taxes' class='setup-2'>
											<div class='content'> 
												<div class="row">
													<div class='col-md-12'>
														<button id='add-tax-btn' type='button' class='btn btn-info btn-sm btn-raised ripple-effect' style='float: left; z-index: 9999999;'>Add</button>
														<table id='tax' class='table table-bordered' style="width: 100%;">
															<thead>
																<th></th>
																<th>Seq</th>
																<th>Code</th>
																<th>Name</th>
																<th>Short Name</th>
																<th>Rate</th>
																<th>Base</th>
															</thead>
														</table>
													</div>
												</div>	
												<div class='row'>
													<div class='col-md-6' style="padding: 0;">
														<button type="button" class="go_to_seq_3 setup-prev btn btn-info btn-raised ripple-effect" aria-label="Previous">Prev</button>	  
													</div>
													<div class='col-md-6' style="padding: 0;">
														<button id='finish-btn' type="button" class="setup-next btn btn-info btn-raised ripple-effect" aria-label="Next">FINISH</button>
													</div>
												</div>							
											</div>
										</li>				
										
										<!-- <li id='setup-5' setup-title='Branches'>
											<div class='content'>
												<div class='row'>
													<p id='go_to_users'><i class='fa fa-angle-left' style='font-size: 13px;'></i>&nbsp;Go back to Users</p>
													<div class='col-md-12' style="text-align: left;">
														<button id='add-user-account' type='button' class='btn btn-info btn-sm btn-raised ripple-effect'><i class='fa fa-plus'></i></button>
													</div>
													<div class='col-md-12'>
														<table id='admin-branches' class='table table-bordered' style="width: 100%;">
															<thead>
																<th></th>
																<th>Username</th>
																<th>Access Level</th>
																<th>Branch</th>
															</thead>
														</table>
													</div>
												</div>
											</div>
										</li> -->
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id='edit-profile-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Profile</h4>
	</div>
	<div class='modal-body body'>
		<table width='90%'>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Company Name</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='company_name' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Individual Name</label></td>
				<td style='padding-top: 5px;'>
					<input class='form-control' type='text' name='individual_name' required>
				</td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
				<td style='padding-top: 5px;'>
					<input class='form-control' type='text' name='address' required>
				</td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Tax Type</label></td>
				<td style='padding-top: 5px;'>
					<select id='edit-profile-tax-type' name='tax_type' required>
						<option value='vat'>VAT</option>
						<option value='not-vat'>Non-VAT</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>TIN</label></td>
				<td style='padding-top: 5px;'>
					<input class='form-control' type='text' name='tin' required>
				</td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Mobile Number</label></td>
				<td style='padding-top: 5px;'>
					<input class='form-control' type='text' name='mobile_number' required>
				</td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Email</label></td>
				<td style='padding-top: 5px;'>
					<input class='form-control' type='text' name='email' required>
				</td>
			</tr>
		</table>
	</div>
	<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
		<button id='edit-profile-submit' class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>OK</button>
	</div>
</div>

<div id='add-user-account-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add User Account</h4>
	</div>
	<div class='modal-body body'>
		<table width='90%'>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Username</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='add-username' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Password</label></td>
				<td style='padding-top: 5px;'>
					<input id='password1' class='form-control' type='password' name='add-password' required>
				</td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Confirm Password</label></td>
				<td style='padding-top: 5px;'>
					<p id='password_not_match' style='display: none; color: red; font-size: 11px; margin: 0;'>Password not match</p>
					<input id='password2' class='form-control' type='password' name='add-confirm-password' required>
				</td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Branch</label></td>
				<td style='padding-top: 5px;'>
					<select id='add-user-branch' name='add-branch' required>
						<option value="">Select...</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Access Level</label></td>
				<td style='padding-top: 5px;'>
					<select id='add-user-type' name='add-type' required>
						<option value="">Select...</option>
						<option value="Admin">Admin</option>
						<option value="User">User</option>
					</select>
				</td>
			</tr>
		</table>
	</div>
	<input id='add_p_id' type="hidden" name="add-p-id">
	<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
		<button id='add-user-account-submit' class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>OK</button>
	</div>
</div>
<div id='edit-user-account-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit User Account</h4>
	</div>
	<div class='modal-body body'>
		<table width='90%'>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Username</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='edit-username' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Password</label></td>
				<td style='padding-top: 5px;'>
					<input id='password1' class='form-control' type='password' name='edit-password'>
				</td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Confirm Password</label></td>
				<td style='padding-top: 5px;'>
					<p id='password_not_match' style='display: none; color: red; font-size: 11px; margin: 0;'>Password not match</p>
					<input id='password2' class='form-control' type='password' name='edit-confirm-password'>
				</td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Branch</label></td>
				<td style='padding-top: 5px;'>
					<select id='edit-user-branch' name='edit-branch' required>
						<option value="">Select...</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Access Level</label></td>
				<td style='padding-top: 5px;'>
					<select id='edit-user-type' name='edit-type' required>
						<option value="">Select...</option>
						<option value="Admin">Admin</option>
						<option value="User">User</option>
					</select>
				</td>
			</tr>
		</table>
	</div>
	<input id='edit_u_id' type="hidden" name="edit-u-id">
	<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
		<button id='edit-user-account-submit' class='btn btn-info btn-sm btn-raised ripple-effect' type='submit' style='float: right;'>OK</button>
	</div>
</div>


<div id='add-user-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add User</h4>
	</div>
	<div class='modal-body body'>
		<table width='90%'>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>First Name</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='add-fname' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Middle Name</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='add-mname' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Last Name</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='add-lname' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='add-user-address' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Mobile No.</label></td>
				<td style='padding-top: 5px;'><input class='form-control number' type='text' name='add-user-cno' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Email</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='add-user-email' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Branch</label></td>
				<td style='padding-top: 5px;'>
					<select name='add-user-branch' placeholder='Select...' required>
					</select>
				</td>
			</tr>
			<tr>
				<td style='width: 150px; text-align: right; padding-right: 20px;'><label>Access Level</label></td>
				<td>
					<select name='add-user-access-level' required>
						<option value='Super Admin'>Super Admin</option>
						<option value='Admin'>Admin</option>
						<option value='User'>User</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style='width: 150px; text-align: right; padding-right: 20px;'><label>Username</label></td>
				<td><input class='form-control' type='text' name='add-user-username' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Password</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='password' name='add-user-password' required readonly></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Validity Date</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='date' name='add-user-validity-date' required></td>
			</tr>
		</table>
	</div>
	<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
		<button id='add-user-submit' class='btn btn-info btn-sm btn-raised ripple-effect' type='button' style='float: right;'>OK</button>
	</div>
</div>
<div id='edit-employee-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit User</h4>
	</div>
	<div class='modal-body body'>
		<table width='90%'>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>First Name</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='edit-fname' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Middle Name</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='edit-mname' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Last Name</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='edit-lname' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='edit-emp-address' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Mobile No.</label></td>
				<td style='padding-top: 5px;'><input class='form-control number' type='text' name='edit-emp-cno' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Email</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='edit-emp-email' required></td>
			</tr>
		</table>
	</div>
	<input type="hidden" name="edit-id">
	<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
		<button id='edit-employee-submit' class='btn btn-info btn-sm btn-raised ripple-effect' type='button' style='float: right;'>OK</button>
	</div>
</div>

<div id='add-branch-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add Branch</h4>
	</div>
	<div class='modal-body body'>
		<table width='90%'>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Branch Name</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='add-branch-name' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='add-branch-address' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>TIN</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='add-branch-tin' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Contact Number</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='add-branch-cno' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Email</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='add-branch-email' required></td>
			</tr>
		</table>
	</div>
	<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
		<button id='add-branch-submit' class='btn btn-info btn-sm btn-raised ripple-effect' type='button' style='float: right;'>OK</button>
	</div>
</div>
<div id='edit-branch-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Branch</h4>
	</div>
	<div class='modal-body body'>
		<table width='90%'>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Branch Name</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='edit-branch-name' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Address</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='edit-branch-address' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>TIN</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='edit-branch-tin' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Contact Number</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='edit-branch-cno' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Email</label></td>
				<td style='padding-top: 5px;'><input class='form-control' type='text' name='edit-branch-email' required></td>
			</tr>
		</table>
	</div>
	<input type="hidden" name="edit-id">
	<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
		<button id='edit-branch-submit' class='btn btn-info btn-sm btn-raised ripple-effect' type='button' style='float: right;'>OK</button>
	</div>
</div>

<div id='add-lvl5-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add Level 5</h4>
	</div>
	<div class='modal-body body'>
		<table width='90%'>
			<tr>
				<td style='padding-top: 5px; width: 100px; text-align: right; padding-right: 20px;'><label>Name</label></td>
				<td colspan='2' style='padding-top: 5px;'><input class='form-control' type='text' name='add-lvl-5-name' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 100px; text-align: right; padding-right: 20px;'><label>Level 4</label></td>
				<td style='padding-top: 5px;'>
					<select id='add-lvl-4-selectize' type='text' name='add-lvl-4' required>
						<option value="">Select...</option>
					</select>
				</td>
				<td style="width: 80px;">
					<input class='form-control' type="text" name="lvl-4-code" style='height: 32px;' disabled>
				</td>
			</tr>
			
		</table>
	</div>
	<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
		<button id='add-lvl-5-submit' class='btn btn-info btn-sm btn-raised ripple-effect' type='button' style='float: right;'>OK</button>
	</div>
</div>
<div id='edit-lvl5-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Level 5</h4>
	</div>
	<div class='modal-body body'>
		<table width='90%'>
			<tr>
				<td style='padding-top: 5px; width: 100px; text-align: right; padding-right: 20px;'><label>Code</label></td>
				<td colspan='2' style='padding-top: 5px;'><input class='form-control' type='text' name='edit-lvl-5-code' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 100px; text-align: right; padding-right: 20px;'><label>Name</label></td>
				<td colspan='2' style='padding-top: 5px;'><input class='form-control' type='text' name='edit-lvl-5-name' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 100px; text-align: right; padding-right: 20px;'><label>Level 5</label></td>
				<td style='padding-top: 5px;'>
					<select id='edit-lvl-4-selectize' type='text' name='edit-lvl-4' required>
						<option value="">Select...</option>
					</select>
				</td>
				<td style="width: 80px;">
					<input class='form-control' type="text" name="lvl-4-code" style='height: 32px;' disabled>
				</td>
			</tr>
			
		</table>
	</div>
	<input type="hidden" name="edit-lvl-5-id">
	<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
		<button id='edit-lvl-5-submit' class='btn btn-info btn-sm btn-raised ripple-effect' type='button' style='float: right;'>OK</button>
	</div>
</div>

<div id='add-lvl6-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add Level 6</h4>
	</div>
	<div class='modal-body body'>
		<table width='90%'>
			<tr>
				<td style='padding-top: 5px; width: 100px; text-align: right; padding-right: 20px;'><label>Name</label></td>
				<td colspan='2' style='padding-top: 5px;'><input class='form-control' type='text' name='add-lvl-6-name' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 100px; text-align: right; padding-right: 20px;'><label>Level 5</label></td>
				<td style='padding-top: 5px;'>
					<select id='add-lvl-5-selectize' type='text' name='add-lvl-5' required>
						<option value="">Select...</option>
					</select>
				</td>
				<td style="width: 80px;">
					<input class='form-control' type="text" name="lvl-5-code" style='height: 32px;' disabled>
				</td>
			</tr>
			
		</table>
	</div>
	<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
		<button id='add-lvl-6-submit' class='btn btn-info btn-sm btn-raised ripple-effect' type='button' style='float: right;'>OK</button>
	</div>
</div>
<div id='edit-lvl6-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Level 6</h4>
	</div>
	<div class='modal-body body'>
		<table width='90%'>
			<tr>
				<td style='padding-top: 5px; width: 100px; text-align: right; padding-right: 20px;'><label>Code</label></td>
				<td colspan='2' style='padding-top: 5px;'><input class='form-control' type='text' name='edit-lvl-6-code' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 100px; text-align: right; padding-right: 20px;'><label>Name</label></td>
				<td colspan='2' style='padding-top: 5px;'><input class='form-control' type='text' name='edit-lvl-6-name' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 100px; text-align: right; padding-right: 20px;'><label>Level 5</label></td>
				<td style='padding-top: 5px;'>
					<select id='edit-lvl-5-selectize' type='text' name='edit-lvl-5' required>
						<option value="">Select...</option>
					</select>
				</td>
				<td style="width: 80px;">
					<input class='form-control' type="text" name="lvl-5-code" style='height: 32px;' disabled>
				</td>
			</tr>
			
		</table>
	</div>
	<input type="hidden" name="edit-lvl-6-id">
	<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
		<button id='edit-lvl-6-submit' class='btn btn-info btn-sm btn-raised ripple-effect' type='button' style='float: right;'>OK</button>
	</div>
</div>

<div id='add-tax-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Add Tax</h4>
	</div>
	<div class='modal-body body'>
		<table width='90%'>
			<tr>
				<td style='width: 150px; text-align: right; padding-right: 20px;'><label>Type</label></td>
				<td colspan='3'>
					<select id='add-select-tax-type' name='add-type' required>
						<option value=''>Select...</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style='width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
				<td colspan='3'><input class='form-control no-space' type='text' name='add-name' required></td>
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
		<button id='add-tax-submit' class='btn btn-info btn-sm btn-raised ripple-effect' type='button' style='float: right;'>Ok</button>
	</div>
</div>
<div id='edit-tax-popover' class='modal fade' role='dialog' tabindex='-1'>
	<div style='border-bottom: 1px groove; height: 30px; padding-bottom: 10px;'>
		<button class='close close-popover' type='button' data-dismiss='modal' style='padding-right: 10px;'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' style="font-family: 'Roboto Condensed', sans-serif;">Edit Tax</h4>
	</div>
	<div class='modal-body body'>
		<table width='90%'>
			<tr>
				<td style='width: 150px; text-align: right; padding-right: 20px;'><label>Code</label></td>
				<td colspan='3'><input class='form-control no-space' type='text' name='edit-code' required></td>
			</tr>
			<tr>
				<td style='width: 150px; text-align: right; padding-right: 20px; padding-top: 5px;'><label>Type</label></td>
				<td colspan='3' style='padding-top: 5px;'>
					<select id='edit-select-tax-type' name='edit-type' required>
						<option value=''>Select...</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style='width: 150px; text-align: right; padding-right: 20px;'><label>Name</label></td>
				<td colspan='3'><input class='form-control no-space' type='text' name='edit-name' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Shortname</label></td>
				<td colspan='3' style='padding-top: 5px;'><input class='form-control no-space' type='text' name='edit-shortname' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Rate</label></td>
				<td colspan='3' style='padding-top: 5px;'><input class='form-control no-space decimal' type='text' name='edit-rate' required></td>
			</tr>
			<tr>
				<td style='padding-top: 5px; width: 150px; text-align: right; padding-right: 20px;'><label>Base</label></td>
				<td colspan='3' style='padding-top: 5px;'><input class='form-control no-space decimal' type='text' name='edit-base' required></td>
			</tr>
		</table>
	</div>
	<input type="hidden" name="edit-t-id">
	<div class='modal-footer' style='border-top: 1px inset; padding-top: 5px; padding-bottom: 0px;'>
		<button id='edit-tax-submit' class='btn btn-info btn-sm btn-raised ripple-effect' type='button' style='float: right;'>Ok</button>
	</div>
</div>

<div id='finish-modal' class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog modal-lg" role="document" style="margin-top: 10%;">
    	<div class="modal-content">
      		<div class="modal-body" style="padding-bottom: 0;">
        		<div class='row'>
        			<div class='col-md-4' style='margin: 0; text-align: center;'>
        				<img src="<?php echo base_url(); ?>assets/img/1.png" style='width: 150px; margin-top: 10%'>
        				<p style="font-weight: bold; font-size: 35px; margin: 0;">Docpro</p>
        				<p style="font-size: 18px; margin: 0;">Business Solutions</p>
        			</div>
        			<div class='col-md-8' style="margin: 0; padding-left: 0;">
        				<h3>Setup Completed Successfully!</h3>
        				<p>Proceed to configure settings</p>
        				<hr style="padding: 1px; background-color: #9E9E9E; margin-top: 127px;">
        			</div>
        		</div>
      		</div>
      		<div class="modal-footer" style="border: none; padding-top: 0;">
        		<a href="<?php echo base_url(); ?>company_settings" class="btn btn-default" style="text-transform: none;">Continue</a>
      		</div>
   		</div>
  	</div>
</div>