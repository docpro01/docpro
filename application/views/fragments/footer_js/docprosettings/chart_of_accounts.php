<script type="text/javascript" src="<?php echo base_url(); ?>libs/selectize_2/js/standalone/selectize.min.js"></script>
<script>
	var create = $('#create-table').DataTable({
		ajax : window.location.origin+'/docpro_settings/chart_of_accounts/coa_get',
		columns : [
					{
						bSortable: false, bSearchable: false,
						mRender: function(row, setting, full){
							return "<button type='button' class='btn btn-primary btn-xs btn-raised title view' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                    <button type='button' class='btn btn-success btn-xs btn-raised title edit' custom-title='Edit'><i class='fa fa-pencil'></i></button>";
						}
					},
					{data: 'coa_code'},
					{data: 'coa_name'},
					{data: 'lvl_3_bir'}
				],
		columnDefs: [{targets: 0, width: '80px'}, {targets: 1, width: '100px'}, {targets: 2, width: '40%'}],
		order: [['1', 'asc']],
		scrollX: true
	});

	var coa_setup_1 = function(){
		window.location = window.location.origin+'/docpro_settings/chart_of_accounts/redirect_coa_setup/1';
	}
	var coa_setup_2 = function(){
		window.location = window.location.origin+'/docpro_settings/chart_of_accounts/redirect_coa_setup/2';
	}
	var coa_setup_3 = function(){
		window.location = window.location.origin+'/docpro_settings/chart_of_accounts/redirect_coa_setup/3';
	}
	var coa_setup_4 = function(){
		window.location = window.location.origin+'/docpro_settings/chart_of_accounts/redirect_coa_setup/4';
	}

	$('#add-coa').click(function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
		var initlvl6 = function(){
			// $('#coa-add-lvl-6').selectize({
			// 	create: false,
			// 	sortField: {
			// 		field: 'text',
			// 		direction: 'asc'
			// 	},
			// 	dropdownParent: 'body',
			// 	onChange: function(value){
			// 		if($(this)[0].options[value]){
			// 			$('#add-coa-dis-lvl6-code').val($(this)[0].options[value].code);
			// 		}else{
			// 			$('#add-coa-dis-lvl6-code').val('');
			// 		}
			// 		var lvl1_code = $('#add-coa-dis-lvl1-code').val();
			// 		var lvl2_code = $('#add-coa-dis-lvl2-code').val();
			// 		var lvl3_code = $('#add-coa-dis-lvl3-code').val();
			// 		var lvl4_code = $('#add-coa-dis-lvl4-code').val();
			// 		var lvl5_code = $('#add-coa-dis-lvl5-code').val();
			// 		var lvl6_code = $('#add-coa-dis-lvl6-code').val();
			// 		$('.popover #coa-add-code').val(lvl1_code+lvl2_code+lvl3_code+lvl4_code+lvl5_code+lvl6_code);
			// 	},
		 //      	onDropdownClose: function(dropdown){
		 //      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
		 //      	}
			// });
		}
		var initlvl5 = function(){
			$('#coa-add-lvl-5').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body',
				onChange: function(value){
					// var selectize = $('#coa-add-lvl-6.selectized').selectize()[0].selectize;
					// selectize.clear();
     //    			selectize.clearOptions();
					// $.get(window.location.origin+'/docpro_settings/chart_of_accounts/filter_lvl6', {lvl_id: $('#coa-add-lvl-5').val()}, function(response){
					// 	var data = JSON.parse(response);
					// 	var selectOptions = [];
					// 	$.each(data, function(index, lvl){
					// 		selectOptions.push({
					//             text: lvl.lvl_6_name,
					//             value: lvl.lvl_6_id,
					//             code: lvl.lvl_6_code
					//           });
					// 	});

					// 	selectize.clear();
     //    				selectize.clearOptions();
					// 	selectize.renderCache = {};
					// 	selectize.load(function(callback) {
					// 	    callback(selectOptions);
					// 	});
					// 	selectize.setValue((data.length > 0) ? data[0].lvl_6_id : '');
					// 	$('.popover.coa-add input#coa-add-lvl-6-input').val((data.length > 0) ? data[0].lvl_6_id : '');
					// });
					if($(this)[0].options[value]){
						$('#add-coa-dis-lvl5-code').val($(this)[0].options[value].code);
					}else{
						$('#add-coa-dis-lvl5-code').val('');
					}
					$('.popover #coa-add-code').val('');

					var lvl1_code = $('#add-coa-dis-lvl1-code').val();
					var lvl2_code = $('#add-coa-dis-lvl2-code').val();
					var lvl3_code = $('#add-coa-dis-lvl3-code').val();
					var lvl4_code = $('#add-coa-dis-lvl4-code').val();
					var lvl5_code = $('#add-coa-dis-lvl5-code').val();
					$('.popover #coa-add-code').val(lvl1_code+lvl2_code+lvl3_code+lvl4_code+lvl5_code);
				},
		      	onDropdownClose: function(dropdown){
		      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
		      	}
			});
		}
		var initlvl4 = function(){
			$('#coa-add-lvl-4').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: null,
				onChange: function(value){
					var selectize = $('#coa-add-lvl-5.selectized').selectize()[0].selectize;
					selectize.clear();
        			selectize.clearOptions();
					$.get(window.location.origin+'/docpro_settings/chart_of_accounts/filter_lvl5', {lvl_id: $('#coa-add-lvl-4').val()}, function(response){
						var data = JSON.parse(response);
						var selectOptions = [];
						$.each(data, function(index, lvl){
							selectOptions.push({
					            text: lvl.lvl_5_name,
					            value: lvl.lvl_5_id,
					            code: lvl.lvl_5_code
					          });
						});

						selectize.clear();
        				selectize.clearOptions();
						selectize.renderCache = {};
						selectize.load(function(callback) {
						    callback(selectOptions);
						});
						selectize.setValue((data.length > 0) ? data[0].lvl_5_id : '');
						$('.popover.coa-add input#coa-add-lvl-5-input').val((data.length > 0) ? data[0].lvl_5_id : '');

					});
					if($(this)[0].options[value]){
						$('#add-coa-dis-lvl4-code').val($(this)[0].options[value].code);
					}else{
						$('#add-coa-dis-lvl4-code').val('');
					}
					$('.popover #coa-add-code').val('');
				}
				,
				onType  : function(text) {
					var dropdown = '.coa-add tr:nth-child(4) .selectize-dropdown.single.form-control';
			        if(this.currentResults.items.length === 0){
			        	setTimeout(function(){
				        	$(dropdown+' .selectize-dropdown-content').html("<a class='no-results-found' href='#' onclick='coa_setup_4()'><span>No Results Found!</span><br><span>Add New Record</span></a>");
				        	$(dropdown).addClass('show');
				        }, 200);
			        }
			        if(text.length === 0){
			        	$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			        }
		      	},
		      	onBlur: function(){
		      		setTimeout(function(){
		      			$('.coa-add tr:nth-child(4) .selectize-dropdown.single.form-control').removeClass('show');
		      		}, 200);
		      	},
		      	onDropdownClose: function(dropdown){
		      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
		      	}
			});
		}
		var initlvl3 = function(){
			$('#coa-add-lvl-3').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: null,
				onChange: function(value){
					var selectize = $('#coa-add-lvl-4.selectized').selectize()[0].selectize;
					selectize.clear();
        			selectize.clearOptions();
					$.get(window.location.origin+'/docpro_settings/chart_of_accounts/filter_lvl4', {lvl_id: $('#coa-add-lvl-3').val()}, function(response){
						var data = JSON.parse(response);
						var selectOptions = [];
						$.each(data, function(index, lvl){
							selectOptions.push({
					            text: lvl.lvl_4_name,
					            value: lvl.lvl_4_id,
					            code: lvl.lvl_4_code
					          });
						});

						selectize.clear();
        				selectize.clearOptions();
						selectize.renderCache = {};
						selectize.load(function(callback) {
						    callback(selectOptions);
						});
					});
					if($(this)[0].options[value]){
						$('#add-coa-dis-lvl3-code').val($(this)[0].options[value].code);
					}else{
						$('#add-coa-dis-lvl3-code').val('');
					}
					$('.popover #coa-add-code').val('');
				},
				onType  : function(text) {
					var dropdown = '.coa-add tr:nth-child(3) .selectize-dropdown.single.form-control';
			        if(this.currentResults.items.length === 0){
			        	setTimeout(function(){
				        	$(dropdown+' .selectize-dropdown-content').html("<a class='no-results-found' href='#' onclick='coa_setup_3()'><span>No Results Found!</span><br><span>Add New Record</span></a>");
				        	$(dropdown).addClass('show');
				        }, 200);
			        }
			        if(text.length === 0){
			        	$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			        }
		      	},
		      	onBlur: function(){
		      		setTimeout(function(){
		      			$('.coa-add tr:nth-child(3) .selectize-dropdown.single.form-control').removeClass('show');
		      		}, 200);
		      	},
		      	onDropdownClose: function(dropdown){
		      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
		      	}
			});
		}
		var initlvl2 = function(){
			var selectize_lvl2 = $('#coa-add-lvl-2').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: null,
				onChange: function(value){
					var selectize = $('#coa-add-lvl-3.selectized').selectize()[0].selectize;
					selectize.clear();
        			selectize.clearOptions();
					$.get(window.location.origin+'/docpro_settings/chart_of_accounts/filter_lvl3', {lvl_id: $('#coa-add-lvl-2').val()}, function(response){
						var data = JSON.parse(response);
						var selectOptions = [];
						$.each(data, function(index, lvl){
							selectOptions.push({
					            text: lvl.lvl_3_name,
					            value: lvl.lvl_3_id,
					            code: lvl.lvl_3_code
				          	});
						});

						selectize.clear();
        				selectize.clearOptions();
						selectize.renderCache = {};
						selectize.load(function(callback) {
						    callback(selectOptions);
						});
					});
					if($(this)[0].options[value]){
						$('#add-coa-dis-lvl2-code').val($(this)[0].options[value].code);
					}else{
						$('#add-coa-dis-lvl2-code').val('');
					}
					$('.popover #coa-add-code').val('');
				},
				onType  : function(text) {
					var dropdown = '.coa-add tr:nth-child(2) .selectize-dropdown.single.form-control';
			        if(this.currentResults.items.length === 0){
			        	setTimeout(function(){
				        	$(dropdown+' .selectize-dropdown-content').html("<a class='no-results-found' href='#' onclick='coa_setup_2()'><span>No Results Found!</span><br><span>Add New Record</span></a>");
				        	$(dropdown).addClass('show');
				        }, 200);
			        }
			        if(text.length === 0){
			        	$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			        }
		      	},
		      	onBlur: function(){
		      		setTimeout(function(){
		      			$('.coa-add tr:nth-child(2) .selectize-dropdown.single.form-control').removeClass('show');
		      		}, 200);
		      	},
		      	onDropdownClose: function(dropdown){
		      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
		      	}
			});
		}
		var initlvl1 = function(){
			var selectize_lvl1 = $('#coa-add-lvl-1').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: null,
				onChange: function(value){
					if(value === '-1'){
						window.location = window.location.origin+"/docpro_settings/chart_of_accounts/redirect_coa_setup/1";
					}
					var selectize = $('#coa-add-lvl-2.selectized').selectize()[0].selectize;
					selectize.clear();
        			selectize.clearOptions();
					$.get(window.location.origin+'/docpro_settings/chart_of_accounts/filter_lvl2', {lvl_id: $('#coa-add-lvl-1').val()}, function(response){
						var data = JSON.parse(response);
						var selectOptions = [];
						$.each(data, function(index, lvl){
							selectOptions.push({
					            text: lvl.lvl_2_name,
					            value: lvl.lvl_2_id,
					            code: lvl.lvl_2_code
					          });
						});

						selectize.clear();
        				selectize.clearOptions();
						selectize.renderCache = {};
						selectize.load(function(callback) {
						    callback(selectOptions);
						});
					});
					if($(this)[0].options[value]){
						$('#add-coa-dis-lvl1-code').val($(this)[0].options[value].code);
					}else{
						$('#add-coa-dis-lvl1-code').val('');
					}
					$('.popover #coa-add-code').val('');
				},
				onType  : function(text) {
					var dropdown = '.coa-add tr:nth-child(1) .selectize-dropdown.single.form-control';
			        if(this.currentResults.items.length === 0){
			        	setTimeout(function(){
				        	$(dropdown+' .selectize-dropdown-content').html("<a class='no-results-found' href='#' onclick='coa_setup_1()'><span>No Results Found!</span><br><span>Add New Record</span></a>");
				        	$(dropdown).addClass('show');
				        }, 200);
			        }
			        if(text.length === 0){
			        	$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			        }
		      	},
		      	onBlur: function(){
		      		setTimeout(function(){
		      			$('.coa-add tr:nth-child(1) .selectize-dropdown.single.form-control').removeClass('show');
		      		}, 200);
		      	},
		      	onDropdownClose: function(dropdown){
		      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
		      	}
			});
			var selectize = $('#coa-add-lvl-1.selectized').selectize()[0].selectize;
			selectize.clear();
			selectize.clearOptions();
			$.get(window.location.origin+'/docpro_settings/chart_of_accounts/filter_lvl1',function(response){
				var data = JSON.parse(response);
				var selectOptions = [];
				$.each(data, function(index, lvl){
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
			});
		}

		$(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('coa-add');
				return 'right';
			},
			content: function(){
				return $('#add-coa-popover').html();
				return 'right';
			},
			callback: function(){
				initlvl1();
				initlvl2();
				initlvl3();
				initlvl4();
				initlvl5();
				initlvl6();
			},
			container: '.navbar-body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });

		$(this).popover('toggle');
        initRipple();
        no_space();
        initSingleSubmit();
	});
	$('#create-table').on('click', '.view', function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
		var data = create.row(this.closest('tr')).data();
		$(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('coa-view');
				return 'right';
			},
			content: function(){
				return $('#view-coa-popover').html();
				return 'right';
			},
			callback: function(){
				$('#view-coa-dis-lvl1-code').val(data.lvl_1_code);
				$('#coa-view-lvl-1').val(data.lvl_1_name);
				$('#view-coa-dis-lvl2-code').val(data.lvl_2_code);
				$('#coa-view-lvl-2').val(data.lvl_2_name);
				$('#view-coa-dis-lvl3-code').val(data.lvl_3_code);
				$('#coa-view-lvl-3').val(data.lvl_3_name);
				$('#view-coa-dis-lvl4-code').val(data.lvl_4_code);
				$('#coa-view-lvl-4').val(data.lvl_4_name);
				$('#view-coa-dis-lvl5-code').val(data.lvl_5_code);
				$('#coa-view-lvl-5').val(data.lvl_5_name);
				// $('#view-coa-dis-lvl6-code').val(data.lvl_6_code);
				// $('#coa-view-lvl-6').val(data.lvl_6_name);
				$('#coa-view-code').val(data.coa_code);
				$('#coa-view-name').val(data.coa_name);
			},
			container: '.navbar-body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });

		$(this).popover('toggle');
        initValidation();
        initRipple();
	});
	$('#create-table').on('click', '.edit', function(){
		$('body').on('hidden.bs.popover', function (e) {
            $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
        });
		var record_data = create.row(this.closest('tr')).data();
		var initlvl6 = function(){
			// $('#coa-edit-lvl-6').selectize({
			// 	create: false,
			// 	sortField: {
			// 		field: 'text',
			// 		direction: 'asc'
			// 	},
			// 	dropdownParent: 'body',
			// 	onChange: function(value){
			// 		if($(this)[0].options[value]){
			// 			$('#edit-coa-dis-lvl6-code').val($(this)[0].options[value].code);
			// 		}else{
			// 			$('#edit-coa-dis-lvl6-code').val('');
			// 		}
			// 		var lvl1_code = $('#edit-coa-dis-lvl1-code').val();
			// 		var lvl2_code = $('#edit-coa-dis-lvl2-code').val();
			// 		var lvl3_code = $('#edit-coa-dis-lvl3-code').val();
			// 		var lvl4_code = $('#edit-coa-dis-lvl4-code').val();
			// 		var lvl5_code = $('#edit-coa-dis-lvl5-code').val();
			// 		var lvl6_code = $('#edit-coa-dis-lvl6-code').val();
			// 		$('.popover #coa-edit-code').val(lvl1_code+lvl2_code+lvl3_code+lvl4_code+lvl5_code+lvl6_code);
			// 	},
		 //      	onDropdownClose: function(dropdown){
		 //      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
		 //      	},
		 //      	onLoad: function(data){
		 //      		var selectize = $('#coa-edit-lvl-6.selectized').selectize()[0].selectize;
			// 		selectize.setValue(record_data.lvl_6_id);
		 //      	}
			// });
		}
		var initlvl5 = function(){
			$('#coa-edit-lvl-5').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body',
				onChange: function(value){
					// var selectize = $('#coa-edit-lvl-6.selectized').selectize()[0].selectize;
					// selectize.clear();
     //    			selectize.clearOptions();
					// $.get(window.location.origin+'/docpro_settings/chart_of_accounts/filter_lvl6', {lvl_id: $('#coa-edit-lvl-5').val()}, function(response){
					// 	var data = JSON.parse(response);
					// 	var selectOptions = [];
					// 	$.each(data, function(index, lvl){
					// 		selectOptions.push({
					//             text: lvl.lvl_6_name,
					//             value: lvl.lvl_6_id,
					//             code: lvl.lvl_6_code
					//           });
					// 	});

					// 	selectize.clear();
     //    				selectize.clearOptions();
					// 	selectize.renderCache = {};
					// 	selectize.load(function(callback) {
					// 	    callback(selectOptions);
					// 	});
					// 	selectize.setValue((data.length > 0) ? data[0].lvl_6_id : '');
					// 	$('.popover.coa-edit input#coa-edit-lvl-6-input').val((data.length > 0) ? data[0].lvl_6_id : '');
					// });
					if($(this)[0].options[value]){
						$('#edit-coa-dis-lvl5-code').val($(this)[0].options[value].code);
					}else{
						$('#edit-coa-dis-lvl5-code').val('');
					}
					var lvl1_code = $('#edit-coa-dis-lvl1-code').val();
					var lvl2_code = $('#edit-coa-dis-lvl2-code').val();
					var lvl3_code = $('#edit-coa-dis-lvl3-code').val();
					var lvl4_code = $('#edit-coa-dis-lvl4-code').val();
					var lvl5_code = $('#edit-coa-dis-lvl5-code').val();
					$('.popover #coa-edit-code').val(lvl1_code+lvl2_code+lvl3_code+lvl4_code+lvl5_code);
				},
		      	onDropdownClose: function(dropdown){
		      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
		      	},
		      	onLoad: function(data){
		      		var selectize = $('#coa-edit-lvl-5.selectized').selectize()[0].selectize;
					selectize.setValue(record_data.lvl_5_id);
		      	}
			});
		}
		var initlvl4 = function(){
			$('#coa-edit-lvl-4').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: null,
				onChange: function(value){
					var selectize = $('#coa-edit-lvl-5.selectized').selectize()[0].selectize;
					selectize.clear();
        			selectize.clearOptions();
					$.get(window.location.origin+'/docpro_settings/chart_of_accounts/filter_lvl5', {lvl_id: $('#coa-edit-lvl-4').val()}, function(response){
						var data = JSON.parse(response);
						var selectOptions = [];
						$.each(data, function(index, lvl){
							selectOptions.push({
					            text: lvl.lvl_5_name,
					            value: lvl.lvl_5_id,
					            code: lvl.lvl_5_code
					          });
						});

						selectize.clear();
        				selectize.clearOptions();
						selectize.renderCache = {};
						selectize.load(function(callback) {
						    callback(selectOptions);
						});
						selectize.setValue((data.length > 0) ? data[0].lvl_5_id : '');
						$('.popover.coa-edit input#coa-edit-lvl-5-input').val((data.length > 0) ? data[0].lvl_5_id : '');

					});
					if($(this)[0].options[value]){
						$('#edit-coa-dis-lvl4-code').val($(this)[0].options[value].code);
					}else{
						$('#edit-coa-dis-lvl4-code').val('');
					}
					$('.popover #coa-edit-code').val('');
				}
				,
				onType  : function(text) {
					var dropdown = '.coa-edit tr:nth-child(4) .selectize-dropdown.single.form-control';
			        if(this.currentResults.items.length === 0){
			        	setTimeout(function(){
				        	$(dropdown+' .selectize-dropdown-content').html("<a class='no-results-found' href='#' onclick='coa_setup_4()'><span>No Results Found!</span><br><span>Add New Record</span></a>");
				        	$(dropdown).addClass('show');
				        }, 200);
			        }
			        if(text.length === 0){
			        	$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			        }
		      	},
		      	onBlur: function(){
		      		setTimeout(function(){
		      			$('.coa-edit tr:nth-child(4) .selectize-dropdown.single.form-control').removeClass('show');
		      		}, 200);
		      	},
		      	onDropdownClose: function(dropdown){
		      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
		      	},
		      	onLoad: function(data){
		      		var selectize = $('#coa-edit-lvl-4.selectized').selectize()[0].selectize;
					selectize.setValue(record_data.lvl_4_id);
		      	}
			});
		}
		var initlvl3 = function(){
			$('#coa-edit-lvl-3').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: null,
				onChange: function(value){
					var selectize = $('#coa-edit-lvl-4.selectized').selectize()[0].selectize;
					selectize.clear();
        			selectize.clearOptions();
					$.get(window.location.origin+'/docpro_settings/chart_of_accounts/filter_lvl4', {lvl_id: $('#coa-edit-lvl-3').val()}, function(response){
						var data = JSON.parse(response);
						var selectOptions = [];
						$.each(data, function(index, lvl){
							selectOptions.push({
					            text: lvl.lvl_4_name,
					            value: lvl.lvl_4_id,
					            code: lvl.lvl_4_code
					          });
						});

						selectize.clear();
        				selectize.clearOptions();
						selectize.renderCache = {};
						selectize.load(function(callback) {
						    callback(selectOptions);
						});
					});
					if($(this)[0].options[value]){
						$('#edit-coa-dis-lvl3-code').val($(this)[0].options[value].code);
					}else{
						$('#edit-coa-dis-lvl3-code').val('');
					}
					$('.popover #coa-edit-code').val('');
				},
				onType  : function(text) {
					var dropdown = '.coa-edit tr:nth-child(3) .selectize-dropdown.single.form-control';
			        if(this.currentResults.items.length === 0){
			        	setTimeout(function(){
				        	$(dropdown+' .selectize-dropdown-content').html("<a class='no-results-found' href='#' onclick='coa_setup_3()'><span>No Results Found!</span><br><span>Add New Record</span></a>");
				        	$(dropdown).addClass('show');
				        }, 200);
			        }
			        if(text.length === 0){
			        	$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			        }
		      	},
		      	onBlur: function(){
		      		setTimeout(function(){
		      			$('.coa-edit tr:nth-child(3) .selectize-dropdown.single.form-control').removeClass('show');
		      		}, 200);
		      	},
		      	onDropdownClose: function(dropdown){
		      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
		      	},
		      	onLoad: function(data){
		      		var selectize = $('#coa-edit-lvl-3.selectized').selectize()[0].selectize;
					selectize.setValue(record_data.lvl_3_id);
		      	}
			});
		}
		var initlvl2 = function(){
			var selectize_lvl2 = $('#coa-edit-lvl-2').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: null,
				onChange: function(value){
					var selectize = $('#coa-edit-lvl-3.selectized').selectize()[0].selectize;
					selectize.clear();
        			selectize.clearOptions();
					$.get(window.location.origin+'/docpro_settings/chart_of_accounts/filter_lvl3', {lvl_id: $('#coa-edit-lvl-2').val()}, function(response){
						var data = JSON.parse(response);
						var selectOptions = [];
						$.each(data, function(index, lvl){
							selectOptions.push({
					            text: lvl.lvl_3_name,
					            value: lvl.lvl_3_id,
					            code: lvl.lvl_3_code
				          	});
						});

						selectize.clear();
        				selectize.clearOptions();
						selectize.renderCache = {};
						selectize.load(function(callback) {
						    callback(selectOptions);
						});
					});
					if($(this)[0].options[value]){
						$('#edit-coa-dis-lvl2-code').val($(this)[0].options[value].code);
					}else{
						$('#edit-coa-dis-lvl2-code').val('');
					}
					$('.popover #coa-edit-code').val('');
				},
				onType  : function(text) {
					var dropdown = '.coa-edit tr:nth-child(2) .selectize-dropdown.single.form-control';
			        if(this.currentResults.items.length === 0){
			        	setTimeout(function(){
				        	$(dropdown+' .selectize-dropdown-content').html("<a class='no-results-found' href='#' onclick='coa_setup_2()'><span>No Results Found!</span><br><span>Add New Record</span></a>");
				        	$(dropdown).addClass('show');
				        }, 200);
			        }
			        if(text.length === 0){
			        	$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			        }
		      	},
		      	onBlur: function(){
		      		setTimeout(function(){
		      			$('.coa-edit tr:nth-child(2) .selectize-dropdown.single.form-control').removeClass('show');
		      		}, 200);
		      	},
		      	onDropdownClose: function(dropdown){
		      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
		      	},
		      	onLoad: function(data){
		      		var selectize = $('#coa-edit-lvl-2.selectized').selectize()[0].selectize;
					selectize.setValue(record_data.lvl_2_id);
		      	}
			});
		}
		var initlvl1 = function(){
			var selectize_lvl1 = $('#coa-edit-lvl-1').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: null,
				onChange: function(value){
					if(value === '-1'){
						window.location = window.location.origin+"/docpro_settings/chart_of_accounts/redirect_coa_setup/1";
					}
					var selectize = $('#coa-edit-lvl-2.selectized').selectize()[0].selectize;
					selectize.clear();
        			selectize.clearOptions();
					$.get(window.location.origin+'/docpro_settings/chart_of_accounts/filter_lvl2', {lvl_id: $('#coa-edit-lvl-1').val()}, function(response){
						var data = JSON.parse(response);
						var selectOptions = [];
						$.each(data, function(index, lvl){
							selectOptions.push({
					            text: lvl.lvl_2_name,
					            value: lvl.lvl_2_id,
					            code: lvl.lvl_2_code
					          });
						});

						selectize.clear();
        				selectize.clearOptions();
						selectize.renderCache = {};
						selectize.load(function(callback) {
						    callback(selectOptions);
						});
					});
					if($(this)[0].options[value]){
						$('#edit-coa-dis-lvl1-code').val($(this)[0].options[value].code);
					}else{
						$('#edit-coa-dis-lvl1-code').val('');
					}
					$('.popover #coa-edit-code').val('');
				},
				onType  : function(text) {
					var dropdown = '.coa-edit tr:nth-child(1) .selectize-dropdown.single.form-control';
			        if(this.currentResults.items.length === 0){
			        	setTimeout(function(){
				        	$(dropdown+' .selectize-dropdown-content').html("<a class='no-results-found' href='#' onclick='coa_setup_1()'><span>No Results Found!</span><br><span>Add New Record</span></a>");
				        	$(dropdown).addClass('show');
				        }, 200);
			        }
			        if(text.length === 0){
			        	$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
			        }
		      	},
		      	onBlur: function(){
		      		setTimeout(function(){
		      			$('.coa-edit tr:nth-child(1) .selectize-dropdown.single.form-control').removeClass('show');
		      		}, 200);
		      	},
		      	onDropdownClose: function(dropdown){
		      		$('.selectize-dropdown [data-selectable] .highlight').removeClass('highlight');
		      	}
			});
			var selectize = $('#coa-edit-lvl-1.selectized').selectize()[0].selectize;
			selectize.clear();
			selectize.clearOptions();
			$.get(window.location.origin+'/docpro_settings/chart_of_accounts/filter_lvl1',function(response){
				var data = JSON.parse(response);
				var selectOptions = [];
				$.each(data, function(index, lvl){
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
				selectize.setValue(record_data.lvl_1_id);
			});
		}

		$(this).popover({
			animation: true,
			html: true,
			placement: function(context, src){
				$(context).addClass('coa-edit');
				return 'right';
			},
			content: function(){
				return $('#edit-coa-popover').html();
				return 'right';
			},
			callback: function(){
				initlvl1();
				initlvl2();
				initlvl3();
				initlvl4();
				initlvl5();
				initlvl6();
				$('#coa-edit-name').val(record_data.coa_name);
				$('#coa-edit-id').val(record_data.coa_id);
			},
			container: '.navbar-body'
		}).on('show.bs.popover', function(){
            $('.popover').not(this).popover('hide');
            $('.card-body button').attr('disabled', true);
        });

		$(this).popover('toggle');
        initRipple();
        no_space();
        initSingleSubmit();
	});

	$('div').on('click', '.close-popover', function(){
        $('.popover').popover('hide');
        $('.card-body button').removeAttr('disabled');
    });

	$('#switch-state').bootstrapSwitch();
    init_table_option(create, $(this).closest('side-body'));
</script>
