// SETUP 1
var profile_table = $('#profile-table').DataTable({
	ajax: window.location.origin+'/setup/setup1/get_profile',
	columns: [
				{
					bSortable: false, bSearchable: false,
					mRender: function(row, setting, full){
						return "<button class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>";
					}
				},
				{'data': 'cb_name'},
				{'data': 'cb_ind_name'},
				{'data': 'cb_address'},
				{'data': 'cb_tax_type'},
				{'data': 'cb_tin'},
				{'data': 'cb_cno'},
				{'data': 'cb_email'}
			],
	dom: 't',
	order: [['1', 'asc']],
	columnDefs: [{targets: 0, width: '40px'}],
	scrollX: true,
	initComplete: function(){
		init_tooltip();
		initRipple();
	}


});

var branch_table = $('#branch-table').DataTable({
	ajax: window.location.origin+'/setup/setup1/get_branches',
	columns: [
				{
					bSortable: false, bSearchable: false,
					mRender: function(row, setting, full){
						return "<button type='button' class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>"+
							"<button type='button' class='btn btn-danger btn-xs btn-raised delete title' custom-title='Delete'><i class='fa fa-times'></i></button>";
					}
				},
				{'data': 'name'},
				{'data': 'cb_address'},
				{'data': 'cb_tin'},
				{'data': 'cb_cno'},
				{'data': 'cb_email'},
			],
	dom: 'frtip',
	order: [['1', 'asc']],
	columnDefs: [{targets: 0, width: '70px'}],
	scrollX: true,
	initComplete: function(){
		init_tooltip();
		initRipple();
	}
});

// SETUP 2
var users_table = $('#users-table').DataTable({
	ajax: window.location.origin+'/setup/setup1/get_users',
	columns: [
				{
					bSortable: false, bSearchable: false,
					mRender: function(row, setting, full){
						return "<button type='button' class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>"+
							"<button type='button' class='btn btn-danger btn-xs btn-raised delete title' custom-title='Delete'><i class='fa fa-times'></i></button>";
					}
				},
				{'data': 'u_seq'},
				{
					mRender: function(row, setting, full){
						return full.p_fname+' '+full.p_mname+' '+full.p_lname;
					}
				},
				{'data': 'p_address'},
				{'data': 'p_cno'},
				{'data': 'p_email'},
				{'data': 'b_name'},
				{'data': 'u_name'},
				{'data': 'u_type'},
				{
					mRender: function(row, setting, full){
						var date = Date.parse(full.u_validity_date);
						return date.toString('MMM d, yyyy');
					}
				},
			],
	dom: 'frtip',
	order: [['1', 'asc']],
	columnDefs: [{targets: 0, width: '50px'}, {targets: 1, width: '20px'}],
	scrollX: true,
	initComplete: function(){
		init_tooltip();
		initRipple();
	}
});

// SETUP 2
// var admin_users = $('#admin-users').DataTable({
// 	ajax: window.location.origin+'/setup/setup2/table_get_employees',
// 	columns: [
// 				{
// 					bSortable: false, bSearchable: false,
// 					mRender: function(row, setting, full){
// 						return "<button type='button' class='btn btn-default btn-xs btn-raised ripple-effect branch-btn'>Accounts</button>";
// 					}
// 				},
// 				{'data': 'p_fname'},
// 				{'data': 'p_mname'},
// 				{'data': 'p_lname'}
// 			],
// 	scrollX: true,
// 	order: [['1', 'asc']],
// 	columnDefs: [{targets: 0, width: '40px'}],
// 	scrollX: true,
// 	sDom: '<"top"f>rt<"bottom"p><"clear">',
// 	initComplete: function(){
// 		initRipple();
// 	}
// });

// var admin_branches = $('#admin-branches').DataTable({
// 	ajax: window.location.origin+'/setup/setup2/table_get_branches/0',
// 	columns: [
// 				{
// 					bSearchable: false, bSortable: false,
// 					mRender: function(row, setting, full){
// 						return "<button type='button' class='btn btn-success btn-xs btn-raised ripple-effect edit title' custom-title='Edit'><i class='fa fa-pencil'></i>&nbsp</button>"+
// 								"<button type='button' class='btn btn-danger btn-xs btn-raised ripple-effect delete title' custom-title='Remove'><i class='fa fa-times'></i></button>";
// 					}
// 				},
// 				{'data': 'u_name'},
// 				{'data': 'u_type'},
// 				{'data': 'name'}
// 			],
// 	scrollX: true,
// 	order: [['1', 'asc']],
// 	columnDefs: [{targets: 0, width: '70px'}],
// 	scrollX: true,
// 	initComplete: function(){
// 		initRipple();
// 	}
// });

// COA
var lvl_1_id = 0;
var lvl_2_id = 0;
var lvl_3_id = 0;
var lvl_4_id = 0;
var lvl_1_name = '...';
var lvl_2_name = '...';
var lvl_3_name = '...';
var lvl_4_name = '...';

var lvl1 = $('#coa-lvl1').DataTable({
	ajax: window.location.origin+'/setup/setup3/get_coa_lvl1',
	columns: [
				{'data': 'lvl_1_seq'},
				{'data': 'lvl_1_code'},
				{'data': 'lvl_1_name'},
			],
	columnDefs: [{targets: [0,1], width: '70px'}],
	order: [['2', 'asc']],
	scrollX: true,
	sDom: '<"top"f>rt<"bottom"p><"clear">',
	initComplete: function(){
		$('#coa-lvl1').closest('li > div').css('opacity', '1');
	}
});
var lvl2 = $('#coa-lvl2').DataTable({
	ajax: window.location.origin+'/setup/setup3/get_coa_lvl2/'+lvl_1_id,
	columns: [
				{'data': 'lvl_2_seq'},
				{'data': 'lvl_1_code'},
				{'data': 'lvl_2_code'},
				{'data': 'lvl_2_name'},
			],
	columnDefs: [{targets: [0,1,2], width: '70px'}],
	order: [['3', 'asc']],
	scrollX: true,
	sDom: '<"top"f>rt<"bottom"p><"clear">',
	initComplete: function(){
		$('#coa-lvl2').closest('li > div').css('opacity', '1');
	}
});
var lvl3 = $('#coa-lvl3').DataTable({
	ajax: window.location.origin+'/setup/setup3/get_coa_lvl3/'+lvl_2_id,
	columns: [
				{'data': 'lvl_3_seq'},
				{'data': 'lvl_1_code'},
				{'data': 'lvl_2_code'},
				{'data': 'lvl_3_code'},
				{'data': 'lvl_3_name'},
				{'data': 'lvl_3_bir'},
			],
	columnDefs: [{targets: [0,1,2,3], width: '70px'}],
	scrollX: true,
	order: [['4', 'asc']],
	sDom: '<"top"f>rt<"bottom"p><"clear">',
	initComplete: function(){
		$('#coa-lvl3').closest('li > div').css('opacity', '1');
	}
});
var lvl4 = $('#coa-lvl4').DataTable({
	ajax: window.location.origin+'/setup/setup3/get_coa_lvl4/'+lvl_3_id,
	columns: [
				{'data': 'lvl_4_seq'},
				{'data': 'lvl_1_code'},
				{'data': 'lvl_2_code'},
				{'data': 'lvl_3_code'},
				{'data': 'lvl_4_code'},
				{'data': 'lvl_4_name'},
			],
	columnDefs: [{targets: [0,1,2,3,4], width: '70px'}],
	scrollX: true,
	order: [['5', 'asc']],
	sDom: '<"top"f>rt<"bottom"p><"clear">',
	initComplete: function(){
		$('#coa-lvl4').closest('li > div').css('opacity', '1');
	}
});
var lvl5 = $('#coa-lvl5').DataTable({
	ajax: window.location.origin+'/setup/setup3/get_coa_lvl5/'+lvl_4_id,
	columns: [
				{'data': 'lvl_5_seq'},
				{'data': 'lvl_1_code'},
				{'data': 'lvl_2_code'},
				{'data': 'lvl_3_code'},
				{'data': 'lvl_4_code'},
				{'data': 'lvl_5_code'},
				{'data': 'lvl_5_name'},
			],
	order: [['6', 'asc']],
	columnDefs: [{targets: [0,1,2,3,4,5], width: '70px'}],
	scrollX: true,
	sDom: '<"top"f>rt<"bottom"p><"clear">',
	initComplete: function(){
		$('#coa-lvl5').closest('li > div').css('opacity', '1');
	}
});
// var lvl6 = $('#coa-lvl6').DataTable({
// 	ajax: window.location.origin+'/setup/setup3/get_coa_lvl6',
// 	columns: [
// 				{
// 					bSortable: false, bSearchable: false,
// 					mRender: function(row, setting, full){
// 						if(full.lvl_6_setup_company === 'docpro'){
// 							return "";
// 						}
// 						return "<button type='button' class='btn btn-success btn-xs btn-raised edit'><i class='fa fa-pencil'></i></button>"+
// 							"<button type='button' class='btn btn-danger btn-xs btn-raised delete'><i class='fa fa-times'></i></button>";
// 					}
// 				},
// 				{'data': 'lvl_6_code'},
// 				{'data': 'lvl_6_name'},
// 			],
// 	order: [['1', 'asc']],
// 	columnDefs: [{targets: 0, width: '70px'}, {targets: 1, width: '100px'}],
// 	scrollX: true,
// 	sDom: '<"top"f>rt<"bottom"p><"clear">'
// });

$('#coa-lvl1').on('click', 'tr', function(){
		var data = lvl1.row(this).data();
		lvl_1_id = data.lvl_1_id;
		lvl_2_id = 0;
		lvl_3_id = 0;
		lvl_4_id = 0;
		lvl_1_name = data.lvl_1_name;
		lvl_2_name = '...';
		lvl_3_name = '...';
		lvl_4_name = '...';
		$('#coa-lvl1 tr').removeClass('selected');
		$(this).addClass('selected');
		$('#coa-breadcrumb').html('');
		$('#coa-breadcrumb').html("<li><a href='#'>"+lvl_1_name+"</a></li>"+
									"<li><a href='#'>"+lvl_2_name+"</a></li>"+
									"<li><a href='#'>"+lvl_3_name+"</a></li>"+
									"<li><a href='#'>"+lvl_4_name+"</a></li>");
		$('#coa-lvl2').closest('li > div').css('opacity', '0');
		$('#coa-lvl3').closest('li > div').css('opacity', '0');
		$('#coa-lvl4').closest('li > div').css('opacity', '0');
		$('#coa-lvl5').closest('li > div').css('opacity', '0');
		lvl2.ajax.url(window.location.origin+'/setup/setup3/get_coa_lvl2/'+lvl_1_id).load(function(json){
			$('#coa-lvl2').closest('li > div').css('opacity', '1');
		});		
		lvl3.ajax.url(window.location.origin+'/setup/setup3/get_coa_lvl3/'+lvl_2_id).load(function(json){
			$('#coa-lvl3').closest('li > div').css('opacity', '1');
		});		
		lvl4.ajax.url(window.location.origin+'/setup/setup3/get_coa_lvl4/'+lvl_3_id).load(function(json){
			$('#coa-lvl4').closest('li > div').css('opacity', '1');
		});				
		lvl5.ajax.url(window.location.origin+'/setup/setup3/get_coa_lvl5/'+lvl_4_id).load(function(json){
			$('#coa-lvl5').closest('li > div').css('opacity', '1');
		});			
		$('#add-lvl-2-btn').removeAttr('disabled');		
		$('#add-lvl-3-btn').attr('disabled', true);		
		$('#add-lvl-4-btn').attr('disabled', true);		
		$('#add-lvl-5-btn').attr('disabled', true);
		$('#lvl-2-alert').css('display', 'none');		
		$('#lvl-3-alert').css('display', 'block');		
		$('#lvl-4-alert').css('display', 'block');		
		$('#lvl-5-alert').css('display', 'block');		
});
$('#coa-lvl2').on('click', 'tr', function(){
		var data = lvl2.row(this).data();
		lvl_2_id = data.lvl_2_id;
		lvl_3_id = 0;
		lvl_4_id = 0;
		lvl_2_name = data.lvl_2_name;
		lvl_3_name = '...';
		lvl_4_name = '...';
		$('#coa-lvl2 tr').removeClass('selected');
		$(this).addClass('selected');
		$('#coa-breadcrumb').html('');
		$('#coa-breadcrumb').html("<li><a href='#'>"+lvl_1_name+"</a></li>"+
									"<li><a href='#'>"+lvl_2_name+"</a></li>"+
									"<li><a href='#'>"+lvl_3_name+"</a></li>"+
									"<li><a href='#'>"+lvl_4_name+"</a></li>");
		$('#coa-lvl3').closest('li > div').css('opacity', '0');
		$('#coa-lvl4').closest('li > div').css('opacity', '0');
		$('#coa-lvl5').closest('li > div').css('opacity', '0');
		lvl3.ajax.url(window.location.origin+'/setup/setup3/get_coa_lvl3/'+lvl_2_id).load(function(json){
			$('#coa-lvl3').closest('li > div').css('opacity', '1');
		});				
		lvl4.ajax.url(window.location.origin+'/setup/setup3/get_coa_lvl4/'+lvl_3_id).load(function(json){
			$('#coa-lvl4').closest('li > div').css('opacity', '1');
		});					
		lvl5.ajax.url(window.location.origin+'/setup/setup3/get_coa_lvl5/'+lvl_4_id).load(function(json){
			$('#coa-lvl5').closest('li > div').css('opacity', '1');
		});		
		$('#add-lvl-2-btn').removeAttr('disabled');		
		$('#add-lvl-3-btn').removeAttr('disabled');		
		$('#add-lvl-4-btn').attr('disabled', true);		
		$('#add-lvl-5-btn').attr('disabled', true);	
		$('#lvl-2-alert').css('display', 'none');		
		$('#lvl-3-alert').css('display', 'none');		
		$('#lvl-4-alert').css('display', 'block');		
		$('#lvl-5-alert').css('display', 'block');					
});
$('#coa-lvl3').on('click', 'tr', function(){
		var data = lvl3.row(this).data();
		lvl_3_id = data.lvl_3_id;
		lvl_4_id = 0;
		lvl_3_name = data.lvl_3_name;
		lvl_4_name = '...';
		$('#coa-lvl3 tr').removeClass('selected');
		$(this).addClass('selected');
		$('#coa-breadcrumb').html('');
		$('#coa-breadcrumb').html("<li><a href='#'>"+lvl_1_name+"</a></li>"+
									"<li><a href='#'>"+lvl_2_name+"</a></li>"+
									"<li><a href='#'>"+lvl_3_name+"</a></li>"+
									"<li><a href='#'>"+lvl_4_name+"</a></li>");	
		$('#coa-lvl4').closest('li > div').css('opacity', '0');
		$('#coa-lvl5').closest('li > div').css('opacity', '0');
		lvl4.ajax.url(window.location.origin+'/setup/setup3/get_coa_lvl4/'+lvl_3_id).load(function(json){
			$('#coa-lvl4').closest('li > div').css('opacity', '1');
		});					
		lvl5.ajax.url(window.location.origin+'/setup/setup3/get_coa_lvl5/'+lvl_4_id).load(function(json){
			$('#coa-lvl5').closest('li > div').css('opacity', '1');
		});		
		$('#add-lvl-2-btn').removeAttr('disabled');		
		$('#add-lvl-3-btn').removeAttr('disabled');		
		$('#add-lvl-4-btn').removeAttr('disabled');		
		$('#add-lvl-5-btn').attr('disabled', true);
		$('#lvl-2-alert').css('display', 'none');		
		$('#lvl-3-alert').css('display', 'none');		
		$('#lvl-4-alert').css('display', 'none');		
		$('#lvl-5-alert').css('display', 'block');						
});
$('#coa-lvl4').on('click', 'tr', function(){
		var data = lvl4.row(this).data();
		lvl_4_id = data.lvl_4_id;
		lvl_4_name = data.lvl_4_name;
		$('#coa-lvl4 tr').removeClass('selected');
		$(this).addClass('selected');
		$('#coa-breadcrumb').html('');
		$('#coa-breadcrumb').html("<li><a href='#'>"+lvl_1_name+"</a></li>"+
									"<li><a href='#'>"+lvl_2_name+"</a></li>"+
									"<li><a href='#'>"+lvl_3_name+"</a></li>"+
									"<li><a href='#'>"+lvl_4_name+"</a></li>");	
		$('#coa-lvl5').closest('li > div').css('opacity', '0');
		lvl5.ajax.url(window.location.origin+'/setup/setup3/get_coa_lvl5/'+lvl_4_id).load(function(json){
			$('#coa-lvl5').closest('li > div').css('opacity', '1');
		});		
		$('#add-lvl-2-btn').removeAttr('disabled');		
		$('#add-lvl-3-btn').removeAttr('disabled');		
		$('#add-lvl-4-btn').removeAttr('disabled');		
		$('#add-lvl-5-btn').removeAttr('disabled');	
		$('#lvl-2-alert').css('display', 'none');		
		$('#lvl-3-alert').css('display', 'none');		
		$('#lvl-4-alert').css('display', 'none');		
		$('#lvl-5-alert').css('display', 'none');					
});

// TAX TYPES N' TAX
var tt_id = 0;
var tax_types = $('#tax-types').DataTable({
	ajax: window.location.origin+'/setup/setup4/get_tax_types',
	columns: [
				{'data': 'tt_seq'},
				{'data': 'tt_code'},
				{'data': 'tt_name'},
				{'data': 'tt_shortname'}
			],
	order: [['1', 'asc']],
	columnDefs: [{targets: [0,1], width: '40px'}],
	sDom: '<"top"f>rt<"bottom"p><"clear">',
	scrollX: true,
});
var tax = $('#tax').DataTable({
	ajax: window.location.origin+'/setup/setup4/get_tax/'+tt_id,
	columns: [
				{'data': 't_seq'},
				{'data': 't_code'},
				{'data': 't_name'},
				{'data': 't_shortname'},
				{'data': 't_rate'},
				{'data': 't_base'},
			],
	order: [['1', 'asc']],
	columnDefs: [{targets: [0,1], width: '40px'},{targets: 3, width: '150px'},{targets: [4,5], width: '80px'}],
	sDom: '<"top"f>rt<"bottom"p><"clear">',
	scrollX: true,
	initComplete: function(){
		$('#tax').closest('li > div').css('opacity', '1');
	}
});

$('#tax-types').on('click', 'tr', function(){
	var data = tax_types.row($(this)).data();
	tt_id = data.tt_id;
	$('#tax').closest('li > div').css('opacity', '0');
	tax.ajax.url(window.location.origin+'/setup/setup4/get_tax/'+tt_id).load(function(json){
		$('#tax').closest('li > div').css('opacity', '1');
	});
	$('#tax-breadcrumb').html("<li><a href='#'>"+data.tt_name+"</a></li>"+
								"<li><a href='#'>...</a></li>");
	$(this).closest('table').find('tr').removeClass('selected');
	$(this).addClass('selected');
});