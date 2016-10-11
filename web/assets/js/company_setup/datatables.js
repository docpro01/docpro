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
				{'data': 'u_validity_date'},
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
var lvl1 = $('#coa-lvl1').DataTable({
	ajax: window.location.origin+'/setup/setup3/get_coa_lvl1',
	columns: [
				{'data': 'lvl_1_code'},
				{'data': 'lvl_1_name'},
			],
	columnDefs: [{targets: 0, width: '100px'}],
	scrollX: true,
	sDom: '<"top"f>rt<"bottom"p><"clear">'
});
var lvl2 = $('#coa-lvl2').DataTable({
	ajax: window.location.origin+'/setup/setup3/get_coa_lvl2',
	columns: [
				{'data': 'lvl_2_code'},
				{'data': 'lvl_2_name'},
			],
	columnDefs: [{targets: 0, width: '100px'}],
	scrollX: true,
	sDom: '<"top"f>rt<"bottom"p><"clear">'
});
var lvl3 = $('#coa-lvl3').DataTable({
	ajax: window.location.origin+'/setup/setup3/get_coa_lvl3',
	columns: [
				{'data': 'lvl_3_code'},
				{'data': 'lvl_3_name'},
				{'data': 'lvl_3_bir'},
			],
	columnDefs: [{targets: 0, width: '100px'}],
	scrollX: true,
	sDom: '<"top"f>rt<"bottom"p><"clear">'
});
var lvl4 = $('#coa-lvl4').DataTable({
	ajax: window.location.origin+'/setup/setup3/get_coa_lvl4',
	columns: [
				{'data': 'lvl_4_code'},
				{'data': 'lvl_4_name'},
			],
	columnDefs: [{targets: 0, width: '100px'}],
	scrollX: true,
	sDom: '<"top"f>rt<"bottom"p><"clear">'
});
var lvl5 = $('#coa-lvl5').DataTable({
	ajax: window.location.origin+'/setup/setup3/get_coa_lvl5',
	columns: [
				{
					bSortable: false, bSearchable: false,
					mRender: function(row, setting, full){
						if(full.lvl_5_setup_company === 'docpro'){
							return "";
						}
						return "<button type='button' class='btn btn-success btn-xs btn-raised edit'><i class='fa fa-pencil'></i></button>"+
							"<button type='button' class='btn btn-danger btn-xs btn-raised delete'><i class='fa fa-times'></i></button>";
					}
				},
				{'data': 'lvl_5_code'},
				{'data': 'lvl_5_name'},
			],
	order: [['1', 'asc']],
	columnDefs: [{targets: 0, width: '70px'}, {targets: 1, width: '100px'}],
	scrollX: true,
	sDom: '<"top"f>rt<"bottom"p><"clear">'
});
var lvl6 = $('#coa-lvl6').DataTable({
	ajax: window.location.origin+'/setup/setup3/get_coa_lvl6',
	columns: [
				{
					bSortable: false, bSearchable: false,
					mRender: function(row, setting, full){
						if(full.lvl_6_setup_company === 'docpro'){
							return "";
						}
						return "<button type='button' class='btn btn-success btn-xs btn-raised edit'><i class='fa fa-pencil'></i></button>"+
							"<button type='button' class='btn btn-danger btn-xs btn-raised delete'><i class='fa fa-times'></i></button>";
					}
				},
				{'data': 'lvl_6_code'},
				{'data': 'lvl_6_name'},
			],
	order: [['1', 'asc']],
	columnDefs: [{targets: 0, width: '70px'}, {targets: 1, width: '100px'}],
	scrollX: true,
	sDom: '<"top"f>rt<"bottom"p><"clear">'
});

// TAX
var tax = $('#tax').DataTable({
	ajax: window.location.origin+'/setup/setup4/get_tax',
	columns: [
				{
					bSortable: false, bSearchable: false,
					mRender: function(row, setting, full){
						return "<button type='button' class='btn btn-success btn-xs btn-raised edit'><i class='fa fa-pencil'></i></button>"+
							"<button type='button' class='btn btn-danger btn-xs btn-raised delete'><i class='fa fa-times'></i></button>";
					}
				},
				{'data': 't_seq'},
				{'data': 't_code'},
				{'data': 't_name'},
				{'data': 't_shortname'},
				{'data': 't_rate'},
				{'data': 't_base'},
			],
	order: [['1', 'asc']],
	columnDefs: [{targets: 0, width: '70px'},{targets: [1,2], width: '40px'},{targets: 4, width: '150px'},{targets: [5,6], width: '80px'}],
	sDom: '<"top"f>rt<"bottom"p><"clear">',
	scrollX: true,
});