<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/setup.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/company_setup/datatables_default.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/company_setup/nav_tabs.js"></script>

<script type="text/javascript">
	// var flag1 = 0;
	// var flag2 = 0;
	$(document).ready(function(){
		initRipple();
		// $.get(window.location.origin+'/setup/setup1/get_tin_tax_type', function(response){
		// 	var tin_no = JSON.parse(response)[0].cb_tin;
		// 	var tax_type = JSON.parse(response)[0].cb_tax_type;
		// 	$('#tin_no').val(tin_no);
		// 	$('#tax_type').val(tax_type);
		// 	$('#tax_type').selectize({create: false});

		// 	if(tin_no !== ''){flag1 = 1;}
		// 	if(tax_type !== ''){flag2 = 1;}
		// });
		$(document).ajaxStop(function(){
		  	$('#loader').removeClass('show');
		});
	});	
</script>

<!-- VALIDATION -->
<script>
	$('.table-input').on('keydown', '.no_space', function(event){
		if (event.which === 32 && $(this).val().length === 0){
	      return false;
		}
	});
</script>

<!-- SETUP 1 FUNCTION -->
<script>
	$('body').on('click', '#edit-profile-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
						'company_name': popover.find('input[name=company_name]').val(),
						'individual_name': popover.find('input[name=individual_name]').val(),
						'address': popover.find('input[name=address]').val(),
						'tax_type': popover.find('select[name=tax_type]').val(),
						'tin': popover.find('input[name=tin]').val(),
						'mobile_number': popover.find('input[name=mobile_number]').val(),
						'email': popover.find('input[name=email]').val()
					}
		$.get(window.location.origin+'/setup/setup1/edit_profile', data, function(){
			profile_table.ajax.reload();
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
		});
	});
	$('#profile-table').on('click', '.edit', function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
        var data = profile_table.row(this.closest('tr')).data();
		$(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('edit-profile-modal');
				return 'right';
			},
			content: function(){
				return $('#edit-profile-popover').html();
			},
			callback: function(){
				$('.edit-profile-modal').addClass('animate');
				var popover = $('.popover.edit-profile-modal');
				popover.find('select#edit-profile-tax-type').selectize();
				popover.find('input[name=company_name]').val(data.cb_name);
				popover.find('input[name=individual_name]').val(data.cb_ind_name);
				popover.find('input[name=address]').val(data.cb_address);
				popover.find('input[name=tax_type]').val(data.cb_tax_type);
				popover.find('input[name=tin]').val(data.cb_tin);
				popover.find('input[name=mobile_number]').val(data.cb_cno);
				popover.find('input[name=email]').val(data.cb_email);
				initRipple();
		        no_space();
		        initNumberValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
</script>

<!-- SETUP 2 FUNCTION -->
<script>
	$('body').on('click', '#add-user-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
					'add-fname': popover.find('input[name=add-fname]').val(),
					'add-mname': popover.find('input[name=add-mname]').val(),
					'add-lname': popover.find('input[name=add-lname]').val(),
					'add-user-address': popover.find('input[name=add-user-address]').val(),
					'add-user-cno': popover.find('input[name=add-user-cno]').val(),
					'add-user-email': popover.find('input[name=add-user-email]').val(),
					'add-user-branch': popover.find('select[name=add-user-branch]').val(),
					'add-user-access-level': popover.find('select[name=add-user-access-level]').val(),
					'add-user-username': popover.find('input[name=add-user-username]').val(),
					'add-user-password': popover.find('input[name=add-user-password]').val(),
					'add-user-validity-date': popover.find('input[name=add-user-validity-date]').val(),
				}
		$.get(window.location.origin+'/setup/setup2/add_user', data, function(response){
			users_table.ajax.reload();
			$('.popover').popover('hide');
       		$('.card-body button').removeAttr('disabled');
		});
	});
	$('body').on('click', '#edit-user-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
					'edit-fname' : popover.find('input[name=edit-fname]').val(),
					'edit-mname': popover.find('input[name=edit-mname]').val(),
					'edit-lname': popover.find('input[name=edit-lname]').val(),
					'edit-user-address': popover.find('input[name=edit-user-address]').val(),
					'edit-user-cno': popover.find('input[name=edit-user-cno]').val(),
					'edit-user-email': popover.find('input[name=edit-user-email]').val(),
					'edit-user-branch': popover.find('select[name=edit-user-branch]').val(),
					'edit-user-access-level': popover.find('select[name=edit-user-access-level]').val(),
					'edit-user-username': popover.find('input[name=edit-user-username]').val(),
					'edit-user-password': popover.find('input[name=edit-user-password]').val(),
					'edit-user-validity-date': popover.find('input[name=edit-user-validity-date]').val(),
					'edit-profile-id': popover.find('input[name=edit-profile-id]').val(),
					'edit-user-id': popover.find('input[name=edit-user-id]').val(),
				}
		$.get(window.location.origin+'/setup/setup2/edit_user', data, function(response){
			users_table.ajax.reload();
			$('.popover').popover('hide');
       		$('.card-body button').removeAttr('disabled');
		});
	});

	$('#add-user-btn').click(function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
		$(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('add-user-modal');
				return 'right';
			},
			content: function(){
				return $('#add-user-popover').html();
			},
			callback: function(){
				var popover = $('.popover.add-user-modal');
				var access_level = popover.find('select[name=add-user-access-level]').selectize();
				var branches = popover.find('select[name=add-user-branch]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null
				});
				var selectize = branches[0].selectize;
				selectize.clear();
				selectize.clearOptions();
				$.get(window.location.origin+'/setup/setup2/get_branch_list', function(response){
					var data = JSON.parse(response);
					var selectOptions = [];
					$.each(data, function(index, data){
						selectOptions.push({
				            text: data.name,
				            value: data.cbbr_id
			          	});
					});

					selectize.clear();
					selectize.clearOptions();
					selectize.renderCache = {};
					selectize.load(function(callback) {
					    callback(selectOptions);
					});
				});

				popover.find('input[name=add-user-username]').keyup(function(){
					popover.find('input[name=add-user-password]').val($(this).val());
				});
				popover.addClass('animate');
				initRipple();
		        no_space();
		        initNumberValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#users-table').on('click', '.edit', function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
        var data = users_table.row(this.closest('tr')).data();
		$(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('edit-user-modal');
				return 'right';
			},
			content: function(){
				return $('#edit-user-popover').html();
			},
			callback: function(){
				var popover = $('.popover.edit-user-modal');
				var access_level = popover.find('select[name=edit-user-access-level]').selectize();
				var branches = popover.find('select[name=edit-user-branch]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null
				});
				var selectize = branches[0].selectize;
				selectize.clear();
				selectize.clearOptions();
				$.get(window.location.origin+'/setup/setup2/get_branch_list', function(response){
					var branch_data = JSON.parse(response);
					var selectOptions = [];
					$.each(branch_data, function(index, data){
						selectOptions.push({
				            text: data.name,
				            value: data.cbbr_id
			          	});
					});

					selectize.clear();
					selectize.clearOptions();
					selectize.renderCache = {};
					selectize.load(function(callback) {
					    callback(selectOptions);
					});
					selectize.setValue(data.cbbr_id);
				});

				popover.find('input[name=edit-user-username]').keyup(function(){
					popover.find('input[name=edit-user-password]').val($(this).val());
				});

				popover.find('input[name=edit-fname]').val(data.p_fname);
				popover.find('input[name=edit-mname]').val(data.p_mname);
				popover.find('input[name=edit-lname]').val(data.p_lname);
				popover.find('input[name=edit-user-address]').val(data.p_address);
				popover.find('input[name=edit-user-cno]').val(data.p_cno);
				popover.find('input[name=edit-user-email]').val(data.p_email);
				popover.find('input[name=edit-user-access-level]').val(data.u_type);
				popover.find('input[name=edit-user-username]').val(data.u_name);
				popover.find('input[name=edit-user-password]').val(data.u_name);
				var date = Date.parse(data.u_validity_date);
				popover.find('input[name=edit-user-validity-date]').val(date.toString('yyyy-MM-dd'));
				popover.find('input[name=edit-profile-id]').val(data.p_id);
				popover.find('input[name=edit-user-id]').val(data.u_id);
				popover.addClass('animate');
				initRipple();
		        no_space();
		        initNumberValidation();
		        initSingleSubmit();	
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#users-table').on('click', '.delete', function(){
		var table_data = users_table.row(this.closest('tr')).data();
		var data = {
					'p_id': table_data.p_id,
					'u_id': table_data.u_id
				};
		$.get(window.location.origin+'/setup/setup2/delete_user', data, function(response){
			users_table.ajax.reload();
			$('.popover').popover('hide');
       		$('.card-body button').removeAttr('disabled');
		});
	});
</script>

<!-- COA -->
<script>
	$('body').on('click', '#add-lvl-1-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
					'add-lvl-1-name': popover.find('input[name=add-lvl-1-name]').val()
				}
		$.get(window.location.origin+'/setup/setup3/add_coa_lvl1', data, function(){
			lvl1.ajax.reload();
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
		});
	});
	$('body').on('click', '#edit-lvl-1-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
					'edit-lvl-1-code': popover.find('input[name=edit-lvl-1-code]').val(),
					'edit-lvl-1-name': popover.find('input[name=edit-lvl-1-name]').val(),
					'edit-id': popover.find('input[name=edit-id]').val()
				}
		$.get(window.location.origin+'/setup/setup3/edit_coa_lvl1', data, function(){
			lvl1.ajax.reload();
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
		});
	});
	$('#add-lvl-1-btn').click(function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
        $(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('add-lvl-1-modal');
				return 'right';
			},
			content: function(){
				return $('#add-lvl1-popover').html();
			},
			callback: function(){
				$('.popover.add-lvl-1-modal').addClass('animate');
				initRipple();
		        no_space();
		        initNumberValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#coa-lvl1').on('click', '.edit', function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
        var data = lvl1.row(this.closest('tr')).data();
        $(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('edit-lvl-1-modal');
				return 'right';
			},
			content: function(){
				return $('#edit-lvl1-popover').html();
			},
			callback: function(){
				$('.popover.edit-lvl-1-modal').addClass('animate');
				var popover = $('.popover.edit-lvl-1-modal');
				popover.find('input[name=edit-lvl-1-code]').val(data.lvl_1_code);
				popover.find('input[name=edit-lvl-1-name]').val(data.lvl_1_name);
				popover.find('input[name=edit-id]').val(data.lvl_1_id);
				initRipple();
		        no_space();
		        initNumberValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#coa-lvl1').on('click', '.delete', function(){
        var data = lvl1.row(this.closest('tr')).data();
        $.get(window.location.origin+'/setup/setup3/delete_coa_lvl1', {id: data.lvl_1_id}, function(){
        	lvl1.ajax.reload();
        });
	});

	$('body').on('click', '#add-lvl-2-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
				'lvl-1-id': lvl_1_id,
				'add-lvl-2-name': popover.find('input[name=add-lvl-2-name]').val() 
		}
		$.get(window.location.origin+'/setup/setup3/add_coa_lvl2', data, function(){
			lvl2.ajax.reload();
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
		});
	});
	$('body').on('click', '#edit-lvl-2-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
					'edit-id': popover.find('input[name=edit-id]').val(),
					'lvl-1-id': lvl_1_id,
					'edit-lvl-2-code': popover.find('input[name=edit-lvl-2-code]').val(),
					'edit-lvl-2-name': popover.find('input[name=edit-lvl-2-name]').val()
				}
		$.get(window.location.origin+'/setup/setup3/edit_coa_lvl2', data, function(){
			lvl2.ajax.reload();
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
		});
	});
	$('#add-lvl-2-btn').click(function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
        $(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('add-lvl-2-modal');
				return 'right';
			},
			content: function(){
				return $('#add-lvl2-popover').html();
			},
			callback: function(){
				var popover = $('.popover.add-lvl-2-modal');
				popover.find('select[name=add-coa2-lvl-1]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.add-lvl-2-modal').find('input[name=lvl1_code]').val($(this)[0].options[value].code);
						}else{
							$('.add-lvl-2-modal').find('input[name=lvl1_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize = $('#add-coa2-lvl-1.selectized').selectize()[0].selectize;
				selectize.clear();
				selectize.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_1',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_1_name,
				            value: lvl.lvl_1_id,
				            code: lvl.lvl_1_code
			          	});
					});

					selectize.clear();
					selectize.clearOptions();
					selectize.renderCache = {};
					selectize.load(function(callback) {
					    callback(selectOptions);
					});
					selectize.setValue(lvl_1_id);
				});
				$('.popover.add-lvl-2-modal').addClass('animate');
				initRipple();
		        no_space();
		        initNumberValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#coa-lvl2').on('click', '.edit', function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
        var data = lvl2.row(this.closest('tr')).data();
        $(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('edit-lvl-2-modal');
				return 'right';
			},
			content: function(){
				return $('#edit-lvl2-popover').html();
			},
			callback: function(){
				var popover = $('.popover.edit-lvl-2-modal');
				popover.find('select[name=edit-coa2-lvl-1]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.edit-lvl-2-modal').find('input[name=lvl1_code]').val($(this)[0].options[value].code);
						}else{
							$('.edit-lvl-2-modal').find('input[name=lvl1_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize = $('#edit-coa2-lvl-1.selectized').selectize()[0].selectize;
				selectize.clear();
				selectize.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_1',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_1_name,
				            value: lvl.lvl_1_id,
				            code: lvl.lvl_1_code
			          	});
					});

					selectize.clear();
					selectize.clearOptions();
					selectize.renderCache = {};
					selectize.load(function(callback) {
					    callback(selectOptions);
					});
					selectize.setValue(data.lvl_1_id);
				});
				popover.find('input[name=edit-id]').val(data.lvl_2_id);
				popover.find('input[name=edit-lvl-2-code]').val(data.lvl_2_code);
				popover.find('input[name=edit-lvl-2-name]').val(data.lvl_2_name);
				$('.popover.edit-lvl-2-modal').addClass('animate');
				initRipple();
		        no_space();
		        initNumberValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#coa-lvl2').on('click', '.delete', function(){
		var data = lvl2.row(this.closest('tr')).data();
		$.get(window.location.origin+'/setup/setup3/delete_coa_lvl2', {id: data.lvl_2_id}, function(){
			lvl2.ajax.reload();
		});
	});
	
	$('body').on('click', '#add-lvl-3-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
					'lvl-2-id': lvl_2_id,
					'add-lvl-3-name': popover.find('input[name=add-lvl-3-name]').val(),
					'add-lvl-3-bir': popover.find('input[name=add-lvl-3-bir]').val()
				}
		$.get(window.location.origin+'/setup/setup3/add_coa_lvl3', data, function(){
			lvl3.ajax.reload();
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
		});
	});
	$('body').on('click', '#edit-lvl-3-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
					'edit-id': popover.find('input[name=edit-id]').val(),
					'lvl-2-id': lvl_2_id,
					'edit-lvl-3-code': popover.find('input[name=edit-lvl-3-code]').val(),
					'edit-lvl-3-name': popover.find('input[name=edit-lvl-3-name]').val(),
					'edit-lvl-3-bir': popover.find('input[name=edit-lvl-3-bir]').val(),
				}
		$.get(window.location.origin+'/setup/setup3/edit_coa_lvl3', data, function(){
			lvl3.ajax.reload();
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
		});
	});
	$('#add-lvl-3-btn').click(function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
        $(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('add-lvl-3-modal');
				return 'right';
			},
			content: function(){
				return $('#add-lvl3-popover').html();
			},
			callback: function(){
				var popover = $('.popover.add-lvl-3-modal');
				popover.find('select[name=add-coa2-lvl-1]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.add-lvl-3-modal').find('input[name=lvl1_code]').val($(this)[0].options[value].code);
						}else{
							$('.add-lvl-3-modal').find('input[name=lvl1_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize1 = $('#add-coa2-lvl-1.selectized').selectize()[0].selectize;
				selectize1.clear();
				selectize1.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_1',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_1_name,
				            value: lvl.lvl_1_id,
				            code: lvl.lvl_1_code
			          	});
					});

					selectize1.clear();
					selectize1.clearOptions();
					selectize1.renderCache = {};
					selectize1.load(function(callback) {
					    callback(selectOptions);
					});
					selectize1.setValue(lvl_1_id);
				});
				popover.find('select[name=add-coa3-lvl-2]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.add-lvl-3-modal').find('input[name=lvl2_code]').val($(this)[0].options[value].code);
						}else{
							$('.add-lvl-3-modal').find('input[name=lvl2_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize2 = $('#add-coa3-lvl-2.selectized').selectize()[0].selectize;
				selectize2.clear();
				selectize2.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_2',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_2_name,
				            value: lvl.lvl_2_id,
				            code: lvl.lvl_2_code
			          	});
					});

					selectize2.clear();
					selectize2.clearOptions();
					selectize2.renderCache = {};
					selectize2.load(function(callback) {
					    callback(selectOptions);
					});
					selectize2.setValue(lvl_2_id);
				});
				$('.popover.add-lvl-3-modal').addClass('animate');
				initRipple();
		        no_space();
		        initNumberValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#coa-lvl3').on('click', '.edit', function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
        var data = lvl3.row(this.closest('tr')).data();
        $(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('edit-lvl-3-modal');
				return 'right';
			},
			content: function(){
				return $('#edit-lvl3-popover').html();
			},
			callback: function(){
				var popover = $('.popover.edit-lvl-3-modal');
				popover.find('select[name=edit-coa2-lvl-1]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.edit-lvl-3-modal').find('input[name=lvl1_code]').val($(this)[0].options[value].code);
						}else{
							$('.edit-lvl-3-modal').find('input[name=lvl1_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize1 = $('#edit-coa2-lvl-1.selectized').selectize()[0].selectize;
				selectize1.clear();
				selectize1.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_1',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_1_name,
				            value: lvl.lvl_1_id,
				            code: lvl.lvl_1_code
			          	});
					});

					selectize1.clear();
					selectize1.clearOptions();
					selectize1.renderCache = {};
					selectize1.load(function(callback) {
					    callback(selectOptions);
					});
					selectize1.setValue(lvl_1_id);
				});
				popover.find('select[name=edit-coa3-lvl-2]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.edit-lvl-3-modal').find('input[name=lvl2_code]').val($(this)[0].options[value].code);
						}else{
							$('.edit-lvl-3-modal').find('input[name=lvl2_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize2 = $('#edit-coa3-lvl-2.selectized').selectize()[0].selectize;
				selectize2.clear();
				selectize2.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_2',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_2_name,
				            value: lvl.lvl_2_id,
				            code: lvl.lvl_2_code
			          	});
					});

					selectize2.clear();
					selectize2.clearOptions();
					selectize2.renderCache = {};
					selectize2.load(function(callback) {
					    callback(selectOptions);
					});
					selectize2.setValue(lvl_2_id);
				});
				popover.find('input[name=edit-id]').val(data.lvl_3_id);
				popover.find('input[name=edit-lvl-3-code]').val(data.lvl_3_code);
				popover.find('input[name=edit-lvl-3-name]').val(data.lvl_3_name);
				popover.find('input[name=edit-lvl-3-bir]').val(data.lvl_3_bir);
				$('.popover.edit-lvl-3-modal').addClass('animate');
				initRipple();
		        no_space();
		        initNumberValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#coa-lvl3').on('click', '.delete', function(){
		var data = lvl3.row(this.closest('tr')).data();
		$.get(window.location.origin+'/setup/setup3/delete_coa_lvl3', {id: data.lvl_3_id}, function(){
			lvl3.ajax.reload();
		});
	});

	$('body').on('click', '#add-lvl-4-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
					'lvl-3-id': lvl_3_id,
					'add-lvl-4-name': popover.find('input[name=add-lvl-4-name]').val()
				}
		$.get(window.location.origin+'/setup/setup3/add_level_4', data, function(){
			lvl4.ajax.reload();
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
		});
	});
	$('body').on('click', '#edit-lvl-4-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
					'lvl-3-id': lvl_3_id,
					'edit-lvl-4-code': popover.find('input[name=edit-lvl-4-code]').val(),
					'edit-lvl-4-name': popover.find('input[name=edit-lvl-4-name]').val(),
					'edit-id': popover.find('input[name=edit-id]').val()
				}
		$.get(window.location.origin+'/setup/setup3/edit_level_4', data, function(){
			lvl4.ajax.reload();
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
		});
	});
	$('#add-lvl-4-btn').click(function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
        $(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('add-lvl-4-modal');
				return 'right';
			},
			content: function(){
				return $('#add-lvl4-popover').html();
			},
			callback: function(){
				var popover = $('.popover.add-lvl-4-modal');
				popover.find('select[name=add-coa2-lvl-1]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.add-lvl-4-modal').find('input[name=lvl1_code]').val($(this)[0].options[value].code);
						}else{
							$('.add-lvl-4-modal').find('input[name=lvl1_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize1 = $('#add-coa2-lvl-1.selectized').selectize()[0].selectize;
				selectize1.clear();
				selectize1.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_1',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_1_name,
				            value: lvl.lvl_1_id,
				            code: lvl.lvl_1_code
			          	});
					});

					selectize1.clear();
					selectize1.clearOptions();
					selectize1.renderCache = {};
					selectize1.load(function(callback) {
					    callback(selectOptions);
					});
					selectize1.setValue(lvl_1_id);
				});
				popover.find('select[name=add-coa3-lvl-2]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.add-lvl-4-modal').find('input[name=lvl2_code]').val($(this)[0].options[value].code);
						}else{
							$('.add-lvl-4-modal').find('input[name=lvl2_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize2 = $('#add-coa3-lvl-2.selectized').selectize()[0].selectize;
				selectize2.clear();
				selectize2.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_2',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_2_name,
				            value: lvl.lvl_2_id,
				            code: lvl.lvl_2_code
			          	});
					});

					selectize2.clear();
					selectize2.clearOptions();
					selectize2.renderCache = {};
					selectize2.load(function(callback) {
					    callback(selectOptions);
					});
					selectize2.setValue(lvl_2_id);
				});
				popover.find('select[name=add-coa4-lvl-3]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.add-lvl-4-modal').find('input[name=lvl3_code]').val($(this)[0].options[value].code);
						}else{
							$('.add-lvl-4-modal').find('input[name=lvl3_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize3 = $('#add-coa4-lvl-3.selectized').selectize()[0].selectize;
				selectize3.clear();
				selectize3.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_3',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_3_name,
				            value: lvl.lvl_3_id,
				            code: lvl.lvl_3_code
			          	});
					});

					selectize3.clear();
					selectize3.clearOptions();
					selectize3.renderCache = {};
					selectize3.load(function(callback) {
					    callback(selectOptions);
					});
					selectize3.setValue(lvl_3_id);
				});
				$('.popover.add-lvl-4-modal').addClass('animate');
				initRipple();
		        no_space();
		        initNumberValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#coa-lvl4').on('click', '.edit', function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
        var data = lvl4.row(this.closest('tr')).data();
        $(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('edit-lvl-4-modal');
				return 'right';
			},
			content: function(){
				return $('#edit-lvl4-popover').html();
			},
			callback: function(){
				var popover = $('.popover.edit-lvl-4-modal');
				popover.find('select[name=edit-coa2-lvl-1]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.edit-lvl-4-modal').find('input[name=lvl1_code]').val($(this)[0].options[value].code);
						}else{
							$('.edit-lvl-4-modal').find('input[name=lvl1_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize1 = $('#edit-coa2-lvl-1.selectized').selectize()[0].selectize;
				selectize1.clear();
				selectize1.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_1',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_1_name,
				            value: lvl.lvl_1_id,
				            code: lvl.lvl_1_code
			          	});
					});

					selectize1.clear();
					selectize1.clearOptions();
					selectize1.renderCache = {};
					selectize1.load(function(callback) {
					    callback(selectOptions);
					});
					selectize1.setValue(lvl_1_id);
				});
				popover.find('select[name=edit-coa3-lvl-2]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.edit-lvl-4-modal').find('input[name=lvl2_code]').val($(this)[0].options[value].code);
						}else{
							$('.edit-lvl-4-modal').find('input[name=lvl2_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize2 = $('#edit-coa3-lvl-2.selectized').selectize()[0].selectize;
				selectize2.clear();
				selectize2.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_2',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_2_name,
				            value: lvl.lvl_2_id,
				            code: lvl.lvl_2_code
			          	});
					});

					selectize2.clear();
					selectize2.clearOptions();
					selectize2.renderCache = {};
					selectize2.load(function(callback) {
					    callback(selectOptions);
					});
					selectize2.setValue(lvl_2_id);
				});
				popover.find('select[name=edit-coa4-lvl-3]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.edit-lvl-4-modal').find('input[name=lvl3_code]').val($(this)[0].options[value].code);
						}else{
							$('.edit-lvl-4-modal').find('input[name=lvl3_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize3 = $('#edit-coa4-lvl-3.selectized').selectize()[0].selectize;
				selectize3.clear();
				selectize3.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_3',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_3_name,
				            value: lvl.lvl_3_id,
				            code: lvl.lvl_3_code
			          	});
					});

					selectize3.clear();
					selectize3.clearOptions();
					selectize3.renderCache = {};
					selectize3.load(function(callback) {
					    callback(selectOptions);
					});
					selectize3.setValue(lvl_3_id);
				});
				$('.popover.edit-lvl-4-modal').find('input[name=edit-lvl-4-code]').val(data.lvl_4_code);
				$('.popover.edit-lvl-4-modal').find('input[name=edit-lvl-4-name]').val(data.lvl_4_name);
				$('.popover.edit-lvl-4-modal').find('input[name=edit-id]').val(data.lvl_4_id);
				$('.popover.edit-lvl-4-modal').addClass('animate');
				initRipple();
		        no_space();
		        initNumberValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#coa-lvl4').on('click', '.delete', function(){
		var data = lvl4.row(this.closest('tr')).data();
		$.get(window.location.origin+'/setup/setup3/delete_level_4', {id: data.lvl_4_id}, function(){
			lvl4.ajax.reload();
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
		});
	});

	$('body').on('click', '#add-lvl-5-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
					'lvl-4-id': lvl_4_id,
					'lvl-5-name': popover.find('input[name=add-lvl-5-name]').val()
				}
		$.get(window.location.origin+'/setup/setup3/add_level_5', data, function(){
			lvl5.ajax.reload();
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
		});
	});
	$('body').on('click', '#edit-lvl-5-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
					'edit-lvl-5-code': popover.find('input[name=edit-lvl-5-code]').val(),
					'edit-lvl-5-name': popover.find('input[name=edit-lvl-5-name]').val(),
					'edit-id': popover.find('input[name=edit-id]').val(),
					'lvl-4-id': lvl_4_id
				}
		$.get(window.location.origin+'/setup/setup3/edit_level_5', data, function(){
			lvl5.ajax.reload();
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
		});
	});
	$('#add-lvl-5-btn').click(function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
        $(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('add-lvl-5-modal');
				return 'right';
			},
			content: function(){
				return $('#add-lvl5-popover').html();
			},
			callback: function(){
				var popover = $('.popover.add-lvl-5-modal');
				popover.find('select[name=add-coa2-lvl-1]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.add-lvl-5-modal').find('input[name=lvl1_code]').val($(this)[0].options[value].code);
						}else{
							$('.add-lvl-5-modal').find('input[name=lvl1_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize1 = $('#add-coa2-lvl-1.selectized').selectize()[0].selectize;
				selectize1.clear();
				selectize1.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_1',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_1_name,
				            value: lvl.lvl_1_id,
				            code: lvl.lvl_1_code
			          	});
					});

					selectize1.clear();
					selectize1.clearOptions();
					selectize1.renderCache = {};
					selectize1.load(function(callback) {
					    callback(selectOptions);
					});
					selectize1.setValue(lvl_1_id);
				});
				popover.find('select[name=add-coa3-lvl-2]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.add-lvl-5-modal').find('input[name=lvl2_code]').val($(this)[0].options[value].code);
						}else{
							$('.add-lvl-5-modal').find('input[name=lvl2_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize2 = $('#add-coa3-lvl-2.selectized').selectize()[0].selectize;
				selectize2.clear();
				selectize2.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_2',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_2_name,
				            value: lvl.lvl_2_id,
				            code: lvl.lvl_2_code
			          	});
					});

					selectize2.clear();
					selectize2.clearOptions();
					selectize2.renderCache = {};
					selectize2.load(function(callback) {
					    callback(selectOptions);
					});
					selectize2.setValue(lvl_2_id);
				});
				popover.find('select[name=add-coa4-lvl-3]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.add-lvl-5-modal').find('input[name=lvl3_code]').val($(this)[0].options[value].code);
						}else{
							$('.add-lvl-5-modal').find('input[name=lvl3_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize3 = $('#add-coa4-lvl-3.selectized').selectize()[0].selectize;
				selectize3.clear();
				selectize3.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_3',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_3_name,
				            value: lvl.lvl_3_id,
				            code: lvl.lvl_3_code
			          	});
					});

					selectize3.clear();
					selectize3.clearOptions();
					selectize3.renderCache = {};
					selectize3.load(function(callback) {
					    callback(selectOptions);
					});
					selectize3.setValue(lvl_3_id);
				});
				popover.find('select[name=add-coa5-lvl-4]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.add-lvl-5-modal').find('input[name=lvl4_code]').val($(this)[0].options[value].code);
						}else{
							$('.add-lvl-5-modal').find('input[name=lvl4_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize4 = $('#add-coa5-lvl-4.selectized').selectize()[0].selectize;
				selectize4.clear();
				selectize4.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_4',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_4_name,
				            value: lvl.lvl_4_id,
				            code: lvl.lvl_4_code
			          	});
					});

					selectize4.clear();
					selectize4.clearOptions();
					selectize4.renderCache = {};
					selectize4.load(function(callback) {
					    callback(selectOptions);
					});
					selectize4.setValue(lvl_4_id);
				});
				$('.popover.add-lvl-5-modal').addClass('animate');
				initRipple();
		        no_space();
		        initNumberValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#coa-lvl5').on('click', '.edit', function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
        var data = lvl5.row(this.closest('tr')).data();
        $(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('edit-lvl-5-modal');
				return 'right';
			},
			content: function(){
				return $('#edit-lvl5-popover').html();
			},
			callback: function(){
				var popover = $('.popover.edit-lvl-5-modal');
				popover.find('select[name=edit-coa2-lvl-1]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.edit-lvl-5-modal').find('input[name=lvl1_code]').val($(this)[0].options[value].code);
						}else{
							$('.edit-lvl-5-modal').find('input[name=lvl1_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize1 = $('#edit-coa2-lvl-1.selectized').selectize()[0].selectize;
				selectize1.clear();
				selectize1.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_1',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_1_name,
				            value: lvl.lvl_1_id,
				            code: lvl.lvl_1_code
			          	});
					});

					selectize1.clear();
					selectize1.clearOptions();
					selectize1.renderCache = {};
					selectize1.load(function(callback) {
					    callback(selectOptions);
					});
					selectize1.setValue(lvl_1_id);
				});
				popover.find('select[name=edit-coa3-lvl-2]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.edit-lvl-5-modal').find('input[name=lvl2_code]').val($(this)[0].options[value].code);
						}else{
							$('.edit-lvl-5-modal').find('input[name=lvl2_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize2 = $('#edit-coa3-lvl-2.selectized').selectize()[0].selectize;
				selectize2.clear();
				selectize2.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_2',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_2_name,
				            value: lvl.lvl_2_id,
				            code: lvl.lvl_2_code
			          	});
					});

					selectize2.clear();
					selectize2.clearOptions();
					selectize2.renderCache = {};
					selectize2.load(function(callback) {
					    callback(selectOptions);
					});
					selectize2.setValue(lvl_2_id);
				});
				popover.find('select[name=edit-coa4-lvl-3]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.edit-lvl-5-modal').find('input[name=lvl3_code]').val($(this)[0].options[value].code);
						}else{
							$('.edit-lvl-5-modal').find('input[name=lvl3_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize3 = $('#edit-coa4-lvl-3.selectized').selectize()[0].selectize;
				selectize3.clear();
				selectize3.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_3',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_3_name,
				            value: lvl.lvl_3_id,
				            code: lvl.lvl_3_code
			          	});
					});

					selectize3.clear();
					selectize3.clearOptions();
					selectize3.renderCache = {};
					selectize3.load(function(callback) {
					    callback(selectOptions);
					});
					selectize3.setValue(lvl_3_id);
				});
				popover.find('select[name=edit-coa5-lvl-4]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
						if($(this)[0].options[value]){
							$('.edit-lvl-5-modal').find('input[name=lvl4_code]').val($(this)[0].options[value].code);
						}else{
							$('.edit-lvl-5-modal').find('input[name=lvl4_code]').val('');
						}
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize4 = $('#edit-coa5-lvl-4.selectized').selectize()[0].selectize;
				selectize4.clear();
				selectize4.clearOptions();
				$.get(window.location.origin+'/setup/setup3/get_level_4',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, lvl){
						selectOptions.push({
				            text: lvl.lvl_4_name,
				            value: lvl.lvl_4_id,
				            code: lvl.lvl_4_code
			          	});
					});

					selectize4.clear();
					selectize4.clearOptions();
					selectize4.renderCache = {};
					selectize4.load(function(callback) {
					    callback(selectOptions);
					});
					selectize4.setValue(lvl_4_id);
				});
				$('.popover.edit-lvl-5-modal').find('input[name=edit-id]').val(data.lvl_5_id);
				$('.popover.edit-lvl-5-modal').find('input[name=edit-lvl-5-code]').val(data.lvl_5_code);
				$('.popover.edit-lvl-5-modal').find('input[name=edit-lvl-5-name]').val(data.lvl_5_name);
				$('.popover.edit-lvl-5-modal').addClass('animate');
				initRipple();
		        no_space();
		        initNumberValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#coa-lvl5').on('click', '.delete', function(){
		var data = lvl5.row(this.closest('tr')).data();
		$.get(window.location.origin+'/setup/setup3/delete_level_5', {id: data.lvl_5_id}, function(){
			lvl5.ajax.reload();
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
		});
	});

	// $('body').on('click', '#add-lvl-5-submit', function(){
	// 	var popover = $(this).closest('.popover');
	// 	var data = {
	// 		'add-lvl-5-name': popover.find('input[name=add-lvl-5-name]').val(),
	// 		'add-lvl-4': popover.find('select[name=add-lvl-4]').val()
	// 	}
	// 	$.get(window.location.origin+'/setup/setup3/add_coa_lvl5', data, function(response){
	// 		$('.popover').removeClass('animate');
	// 		$('.popover').popover('hide');
	//         $('.card-body button').removeAttr('disabled');
	//         lvl5.ajax.reload();
	// 	});
	// });
	// $('body').on('click', '#edit-lvl-5-submit', function(){
	// 	var popover = $(this).closest('.popover');
	// 	var data = {
	// 		'edit-lvl-5-code': popover.find('input[name=edit-lvl-5-code]').val(),
	// 		'edit-lvl-5-name': popover.find('input[name=edit-lvl-5-name]').val(),
	// 		'edit-lvl-5-id': popover.find('input[name=edit-lvl-5-id]').val(),
	// 		'edit-lvl-4': popover.find('select[name=edit-lvl-4]').val()
	// 	}
	// 	$.get(window.location.origin+'/setup/setup3/edit_coa_lvl5', data, function(response){
	// 		$('.popover').removeClass('animate');
	// 		$('.popover').popover('hide');
	//         $('.card-body button').removeAttr('disabled');
	//         lvl5.ajax.reload();
	// 	});
	// });
	// $('#add-lvl-5-btn').click(function(){
	// 	$('body').on('hidden.bs.popover', function (e) {
 //            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
 //        });
	// 	$(this).popover({
	// 		animation: true,
	// 		html: true,
	// 		placement: function(context, src){
	// 			$(context).addClass('add-lvl-5-modal');
	// 			return 'right';
	// 		},
	// 		content: function(){
	// 			return $('#add-lvl5-popover').html();
	// 		},
	// 		callback: function(){
	// 			$('#add-lvl-4-selectize').selectize({
	// 				create: false,
	// 				sortField: {
	// 					field: 'text',
	// 					direction: 'asc'
	// 				},
	// 				dropdownParent: null,
	// 				onChange: function(value){
	// 					if($(this)[0].options[value]){
	// 						$('.add-lvl-5-modal').find('input[name=lvl-4-code]').val($(this)[0].options[value].code);
	// 					}else{
	// 						$('.add-lvl-5-modal').find('input[name=lvl-4-code]').val('');
	// 					}
	// 				},
	// 		      	onDropdownClose: function(dropdown){
	// 		      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
	// 		      	}
	// 			});
	// 			var selectize = $('#add-lvl-4-selectize.selectized').selectize()[0].selectize;
	// 			selectize.clear();
	// 			selectize.clearOptions();
	// 			$.get(window.location.origin+'/setup/setup3/get_level_4',function(response){
	// 				var data = JSON.parse(response);
	// 				var selectOptions = [];
	// 				$.each(data, function(index, lvl){
	// 					selectOptions.push({
	// 			            text: lvl.lvl_4_name,
	// 			            value: lvl.lvl_4_id,
	// 			            code: lvl.lvl_4_code
	// 		          	});
	// 				});

	// 				selectize.clear();
	// 				selectize.clearOptions();
	// 				selectize.renderCache = {};
	// 				selectize.load(function(callback) {
	// 				    callback(selectOptions);
	// 				});
	// 			});
	// 			$('.add-lvl-5-modal').addClass('animate');
 //            },
 //            container: 'body'
	// 	}).on('show.bs.popover', function(){
 //            $('.popover').not(this).popover('hide');
 //            $('.card-body button').attr('disabled', true);
 //        });
	// 	$(this).popover('toggle');
 //        initRipple();
 //        no_space();
 //        initNumberValidation();
 //        initSingleSubmit();
	// });
	// $('#coa-lvl5').on('click', '.edit', function(){
	// 	$('body').on('hidden.bs.popover', function (e) {
 //            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
 //        });
 //        var data = lvl5.row(this.closest('tr')).data();
	// 	$(this).popover({
	// 		animation: true,
	// 		html: true,
	// 		placement: function(context, src){
	// 			$(context).addClass('edit-lvl-5-modal');
	// 			return 'right';
	// 		},
	// 		content: function(){
	// 			return $('#edit-lvl5-popover').html();
	// 		},
	// 		callback: function(){
	// 			$('#edit-lvl-4-selectize').selectize({
	// 				create: false,
	// 				sortField: {
	// 					field: 'text',
	// 					direction: 'asc'
	// 				},
	// 				dropdownParent: null,
	// 				onChange: function(value){
	// 					if($(this)[0].options[value]){
	// 						$('.edit-lvl-5-modal').find('input[name=lvl-4-code]').val($(this)[0].options[value].code);
	// 					}else{
	// 						$('.edit-lvl-5-modal').find('input[name=lvl-4-code]').val('');
	// 					}
	// 				},
	// 		      	onDropdownClose: function(dropdown){
	// 		      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
	// 		      	}
	// 			});
	// 			var selectize = $('#edit-lvl-4-selectize.selectized').selectize()[0].selectize;
	// 			selectize.clear();
	// 			selectize.clearOptions();
	// 			$.get(window.location.origin+'/setup/setup3/get_level_4',function(response){
	// 				var json_data = JSON.parse(response);
	// 				var selectOptions = [];
	// 				$.each(json_data, function(index, lvl){
	// 					selectOptions.push({
	// 			            text: lvl.lvl_4_name,
	// 			            value: lvl.lvl_4_id,
	// 			            code: lvl.lvl_4_code
	// 		          	});
	// 				});

	// 				selectize.clear();
	// 				selectize.clearOptions();
	// 				selectize.renderCache = {};
	// 				selectize.load(function(callback) {
	// 				    callback(selectOptions);
	// 				});
	// 				selectize.setValue(data.lvl_4_id);
	// 			});
	// 			$('.popover.edit-lvl-5-modal').find('input[name=edit-lvl-5-code]').val(data.lvl_5_code);
	// 			$('.popover.edit-lvl-5-modal').find('input[name=edit-lvl-5-name]').val(data.lvl_5_name);
	// 			$('.popover.edit-lvl-5-modal').find('input[name=edit-lvl-5-id]').val(data.lvl_5_id);
	// 			$('.edit-lvl-5-modal').addClass('animate');
 //            },
 //            container: 'body'
	// 	}).on('show.bs.popover', function(){
 //            $('.popover').not(this).popover('hide');
 //            $('.card-body button').attr('disabled', true);
 //        });
	// 	$(this).popover('toggle');
 //        initRipple();
 //        no_space();
 //        initNumberValidation();
 //        initSingleSubmit();
	// });
	// $('#coa-lvl5').on('click', '.delete', function(){
	// 	var data = lvl5.row(this.closest('tr')).data();
	// 	var keys = {
	// 		lvl_5_id: data.lvl_5_id,
	// 		coalvl45_id: data.coalvl45_id
	// 	}
	// 	$.get(window.location.origin+'/setup/setup3/delete_coa_lvl5', keys, function(response){
	// 		$('.popover').removeClass('animate');
	// 		$('.popover').popover('hide');
	//         $('.card-body button').removeAttr('disabled');
	//         lvl5.ajax.reload();
	// 	});
	// });
</script>

<!-- TAX TYPES -->
<script>
	$('body').on('click', '#add-tax-types-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
		 	'add-name': popover.find('input[name=add-name]').val(),
		 	'add-shortname': popover.find('input[name=add-shortname]').val(),
		}
		$.get(window.location.origin+'/setup/setup4/add_tax_types', data, function(response){
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
	        tax_types.ajax.reload();
		});
	});
	$('body').on('click', '#edit-tax-types-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
		 	'edit-code': popover.find('input[name=edit-code]').val(),
		 	'edit-name': popover.find('input[name=edit-name]').val(),
		 	'edit-shortname': popover.find('input[name=edit-shortname]').val(),
		 	'edit-tt-id': popover.find('input[name=edit-tt-id]').val()
		}
		$.get(window.location.origin+'/setup/setup4/edit_tax_types', data, function(response){
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
	        tax_types.ajax.reload();
		});
	});
	$('#add-tax-types-btn').click(function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
		$(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('add-tax-types-modal');
				return 'right';
			},
			content: function(){
				return $('#add-tax-types-popover').html();
			},
			callback: function(){
				$('.add-tax-types-modal').addClass('animate');
				initRipple();
		        no_space();
		        initNumberValidation();
		        initDecimalValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#tax-types').on('click', '.edit', function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
        var data = tax_types.row(this.closest('tr')).data();
		$(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('edit-tax-types-modal');
				return 'right';
			},
			content: function(){
				return $('#edit-tax-types-popover').html();
			},
			callback: function(){
				$('.popover.edit-tax-types-modal').find('input[name=edit-code]').val(data.tt_code);
				$('.popover.edit-tax-types-modal').find('input[name=edit-name]').val(data.tt_name);
				$('.popover.edit-tax-types-modal').find('input[name=edit-shortname]').val(data.tt_shortname);
				$('.popover.edit-tax-types-modal').find('input[name=edit-tt-id]').val(data.tt_id);
				$('.edit-tax-types-modal').addClass('animate');
				initRipple();
		        no_space();
		        initNumberValidation();
		        initDecimalValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#tax-types').on('click', '.delete', function(){
		var data = tax_types.row(this.closest('tr')).data();
		$.get(window.location.origin+'/setup/setup4/delete_tax_types', {id: data.tt_id}, function(response){
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
	        tax_types.ajax.reload();
		});
	});
</script>

<!-- TAX -->
<script>
	$('body').on('click', '#add-tax-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
		 	'add-type': tt_id,
		 	'add-name': popover.find('input[name=add-name]').val(),
		 	'add-shortname': popover.find('input[name=add-shortname]').val(),
		 	'add-rate': popover.find('input[name=add-rate]').val(),
		 	'add-base': popover.find('input[name=add-base]').val()
		}
		$.get(window.location.origin+'/setup/setup4/add_tax', data, function(response){
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
	        tax.ajax.reload();
		});
	});
	$('body').on('click', '#edit-tax-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
		 	'edit-type': tt_id,
		 	'edit-code': popover.find('input[name=edit-code]').val(),
		 	'edit-name': popover.find('input[name=edit-name]').val(),
		 	'edit-shortname': popover.find('input[name=edit-shortname]').val(),
		 	'edit-rate': popover.find('input[name=edit-rate]').val(),
		 	'edit-base': popover.find('input[name=edit-base]').val(),
		 	'edit-t-id': popover.find('input[name=edit-t-id]').val()
		}
		$.get(window.location.origin+'/setup/setup4/edit_tax', data, function(response){
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
	        tax.ajax.reload();
		});
	});
	$('#add-tax-btn').click(function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
		$(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('add-tax-modal');
				return 'right';
			},
			content: function(){
				return $('#add-tax-popover').html();
			},
			callback: function(){
				$('.add-tax-modal').find('select[name=add-type]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize = $('#add-select-tax-type.selectized').selectize()[0].selectize;
				selectize.clear();
				selectize.clearOptions();
				$.get(window.location.origin+'/setup/setup4/get_tax_types_list',function(response){
					var data = JSON.parse(response);
					var selectOptions = [];
					$.each(data, function(index, lvl){
						selectOptions.push({
				            text: lvl.tt_name,
				            value: lvl.tt_id
			          	});
					});

					selectize.clear();
					selectize.clearOptions();
					selectize.renderCache = {};
					selectize.load(function(callback) {
					    callback(selectOptions);
					});
					selectize.setValue(tt_id);
				});
				$('.add-tax-modal').addClass('animate');
				initRipple();
		        no_space();
		        initNumberValidation();
		        initDecimalValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#tax').on('click', '.edit', function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
        var data = tax.row(this.closest('tr')).data();
		$(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('edit-tax-modal');
				return 'right';
			},
			content: function(){
				return $('#edit-tax-popover').html();
			},
			callback: function(){
				$('.edit-tax-modal').find('select[name=edit-type]').selectize({
					create: false,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: null,
					onChange: function(value){
					},
			      	onDropdownClose: function(dropdown){
			      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			      	}
				});
				var selectize = $('#edit-select-tax-type.selectized').selectize()[0].selectize;
				selectize.clear();
				selectize.clearOptions();
				$.get(window.location.origin+'/setup/setup4/get_tax_types_list',function(response){
					var json_data = JSON.parse(response);
					var selectOptions = [];
					$.each(json_data, function(index, tt){
						selectOptions.push({
				            text: tt.tt_name,
				            value: tt.tt_id
			          	});
					});

					selectize.clear();
					selectize.clearOptions();
					selectize.renderCache = {};
					selectize.load(function(callback) {
					    callback(selectOptions);
					});
					selectize.setValue(data.tt_id);
				});
				$('.popover.edit-tax-modal').find('input[name=edit-code]').val(data.t_code);
				$('.popover.edit-tax-modal').find('input[name=edit-name]').val(data.t_name);
				$('.popover.edit-tax-modal').find('input[name=edit-shortname]').val(data.t_shortname);
				$('.popover.edit-tax-modal').find('input[name=edit-rate]').val(data.t_rate);
				$('.popover.edit-tax-modal').find('input[name=edit-base]').val(data.t_base);
				$('.popover.edit-tax-modal').find('input[name=edit-t-id]').val(data.t_id);
				$('.edit-tax-modal').addClass('animate');
				initRipple();
		        no_space();
		        initNumberValidation();
		        initDecimalValidation();
		        initSingleSubmit();
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
	});
	$('#tax').on('click', '.delete', function(){
		var data = tax.row(this.closest('tr')).data();
		var keys = {
			t_id: data.t_id,
			co_t_id: data.co_t_id
		}
		$.get(window.location.origin+'/setup/setup4/delete_tax', keys, function(response){
			$('.popover').removeClass('animate');
			$('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
	        tax.ajax.reload();
		});
	});

	$('#finish-btn').click(function(){
		$('#finish-modal').modal({
			backdrop: 'static',
			keyboard: false,
			show: true,
		});
	});
</script>

<script>
	$('body').on('click', '#add-branch-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
					'add-branch-name': popover.find('input[name=add-branch-name]').val(),
					'add-branch-address': popover.find('input[name=add-branch-address]').val(),
					'add-branch-tin': popover.find('input[name=add-branch-tin]').val(),
					'add-branch-cno': popover.find('input[name=add-branch-cno]').val(),
					'add-branch-email': popover.find('input[name=add-branch-email]').val()
				}
		$.get(window.location.origin+'/setup/setup1/add_branch', data, function(response){
			branch_table.ajax.reload();
			$('.popover').popover('hide');
       		$('.card-body button').removeAttr('disabled');
		});
	});
	$('body').on('click', '#edit-branch-submit', function(){
		var popover = $(this).closest('.popover');
		var data = {
					'edit-id': popover.find('input[name=edit-id]').val(),
					'edit-branch-name': popover.find('input[name=edit-branch-name]').val(),
					'edit-branch-address': popover.find('input[name=edit-branch-address]').val(),
					'edit-branch-tin': popover.find('input[name=edit-branch-tin]').val(),
					'edit-branch-cno': popover.find('input[name=edit-branch-cno]').val(),
					'edit-branch-email': popover.find('input[name=edit-branch-email]').val()
				}
		$.get(window.location.origin+'/setup/setup1/edit_branch', data, function(response){
			branch_table.ajax.reload();
			$('.popover').popover('hide');
       		$('.card-body button').removeAttr('disabled');
		});
	});

	$('#add-branch-btn').click(function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
		$(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('add-branch-modal');
				return 'right';
			},
			content: function(){
				return $('#add-branch-popover').html();
			},
			callback: function(){
				$('.add-branch-modal').addClass('animate');
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
        initRipple();
        no_space();
        initNumberValidation();
        initSingleSubmit();
	});
	$('#branch-table').on('click', '.edit', function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
        var data = branch_table.row(this.closest('tr')).data();
		$(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('edit-branch-modal');
				return 'right';
			},
			content: function(){
				return $('#edit-branch-popover').html();
			},
			callback: function(){
				$('.edit-branch-modal').find('input[name=edit-branch-name]').val(data.cb_name);
				$('.edit-branch-modal').find('input[name=edit-branch-address]').val(data.cb_address);
				$('.edit-branch-modal').find('input[name=edit-branch-tin]').val(data.cb_tin);
				$('.edit-branch-modal').find('input[name=edit-branch-cno]').val(data.cb_cno);
				$('.edit-branch-modal').find('input[name=edit-branch-email]').val(data.cb_email);
				$('.edit-branch-modal').find('input[name=edit-id]').val(data.cb_id);
				$('.edit-branch-modal').addClass('animate');
            },
            container: 'body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });
		$(this).popover('toggle');
        initRipple();
        no_space();
        initNumberValidation();
        initSingleSubmit();
	});
	$('#branch-table').on('click', '.delete', function(){
		var cb_id = branch_table.row(this.closest('tr')).data().cb_id;
		var cbbr_id = branch_table.row(this.closest('tr')).data().cbbr_id;
		$.get(window.location.origin+'/setup/setup1/delete_branch', {cb_id: cb_id, cbbr_id: cbbr_id}, function(response){
			branch_table.ajax.reload();
			$('.popover').popover('hide');
       		$('.card-body button').removeAttr('disabled');
		});
	});
</script>

<!-- POPOVER FUNCTION -->
<script>
	$('body').on('click', '.close-popover', function(){
		$('.popover').removeClass('animate');
		$('.popover').popover('hide');
        $('.card-body button').removeAttr('disabled');
    });
    $('body').on('click', '#close-btn', function(){
    	$('.popover').removeClass('animate');
        $('.popover').popover('hide');
       	$('.card-body button').removeAttr('disabled');
    });
</script>


<script>
	// var next_setup = function(event){
	// 		$.notify({
	// 		message: "<i class='fa fa-warning'></i> Please fill all necessary information" 
	// 		},{
	// 			type: 'danger',
	// 			placement: {
	// 				from: "top",
	// 				align: "right"
	// 			},
	// 			animate: {
	// 				enter: 'animated fadeInDown',
	// 				exit: 'animated fadeOutUp'
	// 			},
	// 			delay: 1000,
	// 		});
	// 	}
	// }
</script>
