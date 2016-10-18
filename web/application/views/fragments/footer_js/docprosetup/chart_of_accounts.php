<script type="text/javascript">
	var lvl_1_id = parseFloat($('input[name=default_lvl_1_id]').val());
	var lvl_2_id = parseFloat($('input[name=default_lvl_2_id]').val());
	var lvl_3_id = parseFloat($('input[name=default_lvl_3_id]').val());
	var lvl_1_code = $('input[name=default_lvl_1_code]').val();
	var lvl_2_code = $('input[name=default_lvl_2_code]').val();
	var lvl_3_code = $('input[name=default_lvl_3_code]').val();
	var lvl_1_name = $('input[name=default_lvl_1_name]').val();
	var lvl_2_name = $('input[name=default_lvl_2_name]').val();
	var lvl_3_name = $('input[name=default_lvl_3_name]').val();
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>libs/selectize_2/js/standalone/selectize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/docpro_setup/coa_setup_seq.js"></script>
<script>
	var no_space = function(){
        $(".no-space").on({
          keydown: function(e) {
            if (e.which === 32 && $(this).val().length === 0)
              return false;
          },
        });
    }
    var disable_button = function(){
    	if($('.popover').length > 0){
			$('table button').attr('disabled', true);
			$('#add-acc-classification').attr('disabled', true);
			$('#add-line-items').attr('disabled', true);
			$('#add-acc-sub').attr('disabled', true);
		}
    }

	$(document).ready(function(){
		var acc_elements = $('#account-elements').DataTable({
			ajax: window.location.origin+'/docpro_setup/chart_of_accounts/acc_elements_get',
			columns: [
                        {
                            mData: null, bSortable: false, bSearchable: false,
                            mRender: function(data, type, full){
                                return "<button type='button' class='btn btn-primary btn-xs btn-raised view title' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                        <button type='button' class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>\n\
                                        <button type=button class='btn btn-danger btn-xs btn-raised delete title' custom-title='Delete'><i class='fa fa-times'></i></button>";
                            }
                        },
						{'data': 'lvl_1_seq'},
						{'data': 'lvl_1_code'},
						{'data': 'lvl_1_name'},
					],
			columnDefs: [{targets: 0, width: '100px'}, {targets: [1,2], width: '100px'}],
			order: [['2', 'asc']],
			bLengthChange: false,
			fnDrawCallback: function(oSettings) {
				$.each(oSettings.aoData, function(index, data){
					if(data._aData.lvl_1_id+'' === lvl_1_id+''){
						$('#account-elements tbody tr:eq('+index+')').addClass('selected');
					}
				});
			},
			initComplete: function(){
				initRipple();
				init_tooltip();
			}
		});
		var acc_classification = $('#account-classification').DataTable({
			ajax: window.location.origin+'/docpro_setup/chart_of_accounts/reload_lvl_2/'+lvl_1_id,
			columns: [
                        {
                            mData: null, bSortable: false, bSearchable: false,
                            mRender: function(data, type, full){
                            	if(full.lvl_2_code+'' === '0'){
                            		return '';
                            	}
                                return "<button type='button' class='btn btn-primary btn-xs btn-raised view title' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                        <button type='button' class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>\n\
                                        <button type=button class='btn btn-danger btn-xs btn-raised delete title' custom-title='Delete'><i class='fa fa-times'></i></button>";
                            }
                        },
						{'data': 'lvl_2_seq'},
						{'data': 'lvl_1_code'},
						{'data': 'lvl_2_code'},
						{'data': 'lvl_2_name'},
					],
			columnDefs: [{targets: 0, width: '100px'}, {targets: [1,2,3], width: '100px'}],
			order: [['3', 'asc']],
			bLengthChange: false,
			fnDrawCallback: function(oSettings) {
				$.each(oSettings.aoData, function(index, data){
					if(data._aData.lvl_2_id+'' === lvl_2_id+''){
						$('#account-classification tbody tr:eq('+index+')').addClass('selected');
					}
				});
			},
			initComplete: function(){
				$('#lvl-2-plate').css('opacity', '1');
				initRipple();
				init_tooltip();
			}
		});
		var line_items = $('#line-items').DataTable({
			ajax: window.location.origin+'/docpro_setup/chart_of_accounts/reload_lvl_3/'+lvl_2_id,
			columns: [
                        {
                            mData: null, bSortable: false, bSearchable: false,
                            mRender: function(data, type, full){
                            	if(full.lvl_2_code+'' === '0'){
                            		return '';
                            	}
                               	return "<button type='button' class='btn btn-primary btn-xs btn-raised view title' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                        <button type='button' class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>\n\
                                        <button type=button class='btn btn-danger btn-xs btn-raised delete title' custom-title='Delete'><i class='fa fa-times'></i></button>";
                            }
                        },
						{'data': 'lvl_3_seq'},
						{'data': 'lvl_1_code'},
						{'data': 'lvl_2_code'},
						{'data': 'lvl_3_code'},
						{'data': 'lvl_3_name'},
						{'data': 'lvl_3_bir'}
					],
			columnDefs: [{targets: 0, width: '100px'}, {targets: [1,2,3,4], width: '100px'}],
			order: [['4', 'asc']],
			bLengthChange: false,
			fnDrawCallback: function(oSettings) {
				$.each(oSettings.aoData, function(index, data){
					if(data._aData.lvl_3_id+'' === lvl_3_id+''){
						$('#line-items tbody tr:eq('+index+')').addClass('selected');
					}
				});
			},
			initComplete: function(){
				$('#lvl-3-plate').css('opacity', '1');
				initRipple();
				init_tooltip();
			}
		});
		var account_subclassification = $('#account-subclassification').DataTable({
			ajax: window.location.origin+'/docpro_setup/chart_of_accounts/reload_lvl_4/'+lvl_3_id,
			columns: [
                        {
                            mData: null, bSortable: false, bSearchable: false,
                            mRender: function(data, type, full){
                            	if(full.lvl_4_code+'' === '0'){
                            		return '';
                            	}
                                return "<button type='button' class='btn btn-primary btn-xs btn-raised view title' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                        <button type='button' class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>\n\
                                        <button type=button class='btn btn-danger btn-xs btn-raised delete title' custom-title='Delete'><i class='fa fa-times'></i></button>";
                            }
                        },
						{'data': 'lvl_4_seq'},
						{'data': 'lvl_1_code'},
						{'data': 'lvl_2_code'},
						{'data': 'lvl_3_code'},
						{'data': 'lvl_4_code'},
						{'data': 'lvl_4_name'},
					],
			columnDefs: [{targets: 0, width: '100px'}, {targets: [1,2,3,4,5], width: '100px'}],
			order: [['5', 'asc']],
			bLengthChange: false,
			fnDrawCallback: function(oSettings) {
				// $.each(oSettings.aoData, function(index, data){
				// 	if(data._aData.lvl_4_id+'' === lvl_4_id+''){
				// 		$('#account-subclassification tbody tr:eq('+index+')').addClass('selected');
				// 	}
				// });
			},
			initComplete: function(){
				$('#lvl-4-plate').css('opacity', '1');
				initRipple();
				init_tooltip();
			}
		});
		var bir_classification = $('#bir-classification').DataTable({
			ajax: window.location.origin+'/docpro_setup/chart_of_accounts/bir_get',
			columns: [
                        {
                            mData: null, bSortable: false,
                            mRender: function(data, type, full){
                                return "<button type='button' class='btn btn-primary btn-xs btn-raised view title' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                        <button type='button' class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>";
                            }
                        },
						{'data': 'bir_code'},
						{'data': 'bir_classification'},
					],
			columnDefs: [{targets: 0, width: '100px'},{targets: 1, width: '100px'}],
			order: [['1', 'asc']],
			initComplete: function(){
				initRipple();
				init_tooltip();
			}
		});
		var coa = $('#coa').DataTable({
			ajax: window.location.origin+'/docpro_setup/chart_of_accounts/coa_get',
			columns: [
                        {
                            mData: null, bSortable: false,
                            mRender: function(data, type, full){
                                return "<button type='button' class='btn btn-primary btn-xs btn-raised view title' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                        <button type='button' class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>";
                            }
                        },
						{'data': 'coa_code'},
						{'data': 'coa_name'},
						{'data': 'bir_classification'},
					],
			columnDefs: [{targets: 0, width: '70px'}, {targets: 1, width: '100px'}, {targets: 3, width: '35%'}],
			order: [['1', 'asc']],
			initComplete: function(){
				initRipple();
				init_tooltip();
			}
		});
		
		if(lvl_1_id === 0 || isNaN(lvl_1_id)){
			$('#add-acc-classification').attr('disabled', true);
			$('#lvl-2-alert').css('display', 'block');
		}else{
			$('#add-acc-classification').removeAttr('disabled');
			$('#lvl-2-alert').css('display', 'none');
		}
		if(lvl_2_id === 0 || isNaN(lvl_2_id)){
			$('#add-line-items').attr('disabled', true);
			$('#lvl-3-alert').css('display', 'block');
		}else{
			$('#add-line-items').removeAttr('disabled');
			$('#lvl-3-alert').css('display', 'none');
		}
		if(lvl_3_id === 0 || isNaN(lvl_3_id)){
			$('#add-acc-sub').attr('disabled', true);
			$('#lvl-4-alert').css('display', 'block');
		}else{
			$('#add-acc-sub').removeAttr('disabled');
			$('#lvl-4-alert').css('display', 'none');
		}

		var init_breadcrumb = function(){
			$('#coa_breadcrumb').html(
									"<li><a href='#'>"+((lvl_1_name === '') ? '...' : lvl_1_name)+"</a></li>"+
									"<li><a href='#'>"+((lvl_2_name === '') ? '...' : lvl_2_name)+"</a></li>"+
									"<li><a href='#'>"+((lvl_3_name === '') ? '...' : lvl_3_name)+"</a></li>"
								);
		}
		init_breadcrumb();
		
		var reload_tables = function(table){
			if(table === 1){
				$('#lvl-2-plate').css('opacity', '0');
				$('#lvl-3-plate').css('opacity', '0');
				$('#lvl-4-plate').css('opacity', '0');
			}
			if(table === 2){
				$('#lvl-3-plate').css('opacity', '0');
				$('#lvl-4-plate').css('opacity', '0');
			}
			if(table === 3){
				$('#lvl-4-plate').css('opacity', '0');
			}
			acc_classification.ajax.url(window.location.origin+'/docpro_setup/chart_of_accounts/reload_lvl_2/'+lvl_1_id).load(function(){
				disable_button();
				$('#lvl-2-plate').css('opacity', '1');
			});
			line_items.ajax.url(window.location.origin+'/docpro_setup/chart_of_accounts/reload_lvl_3/'+lvl_2_id).load(function(){
				disable_button();
				$('#lvl-3-plate').css('opacity', '1');
			});
			account_subclassification.ajax.url(window.location.origin+'/docpro_setup/chart_of_accounts/reload_lvl_4/'+lvl_3_id).load(function(){
				disable_button();
				$('#lvl-4-plate').css('opacity', '1');
			});
			if(lvl_1_id === 0 || isNaN(lvl_1_id)){
				$('#add-acc-classification').attr('disabled', true);
				$('#lvl-2-alert').css('display', 'block');
			}else{
				$('#add-acc-classification').removeAttr('disabled');
				$('#lvl-2-alert').css('display', 'none');
			}
			if(lvl_2_id === 0 || isNaN(lvl_2_id)){
				$('#add-line-items').attr('disabled', true);
				$('#lvl-3-alert').css('display', 'block');
			}else{
				$('#add-line-items').removeAttr('disabled');
				$('#lvl-3-alert').css('display', 'none');
			}
			if(lvl_3_id === 0 || isNaN(lvl_3_id)){
				$('#add-acc-sub').attr('disabled', true);
				$('#lvl-4-alert').css('display', 'block');
			}else{
				$('#add-acc-sub').removeAttr('disabled');
				$('#lvl-4-alert').css('display', 'none');
			}
		}

		$('#account-elements').on('click', 'tbody tr', function(){
			$(this).closest('table').find('tr').removeClass('selected');
			$(this).addClass('selected');
			lvl_1_code = acc_elements.row($(this)).data().lvl_1_code;
			lvl_1_id = acc_elements.row($(this)).data().lvl_1_id;
			lvl_1_name = acc_elements.row($(this)).data().lvl_1_name;
			lvl_2_code = 0;
			lvl_3_code = 0;
			lvl_2_id = 0;
			lvl_3_id = 0;
			lvl_2_name = '';
			lvl_3_name = '';
			reload_tables(1);
			init_breadcrumb();
		});

		$('#account-classification').on('click', 'tbody tr', function(){
			$(this).closest('table').find('tr').removeClass('selected');
			$(this).addClass('selected');
			lvl_2_code = acc_classification.row($(this)).data().lvl_2_code;
			lvl_2_id = acc_classification.row($(this)).data().lvl_2_id;
			lvl_2_name = acc_classification.row($(this)).data().lvl_2_name;
			lvl_3_code = 0;
			lvl_3_id = 0;
			lvl_3_name = '';
			reload_tables(2);
			init_breadcrumb();
		});

		$('#line-items').on('click', 'tbody tr', function(){
			$(this).closest('table').find('tr').removeClass('selected');
			$(this).addClass('selected');
			lvl_3_code = line_items.row($(this)).data().lvl_3_code;
			lvl_3_id = line_items.row($(this)).data().lvl_3_id;
			lvl_3_name = line_items.row($(this)).data().lvl_3_name;
			reload_tables(3);
			init_breadcrumb();
		});


// ACCOUNT ELEMENTS POPOVER
		$('#add-acc-elements').click(function(){
			$('body').on('hidden.bs.popover', function (e) {
			    $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
			});
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('acc-elements-add');
					return 'right';
				},
				content: function(){
					return $('#add-acc-elements-popover').html();
				},
				callback: function(){
					var popover = $('.popover.acc-elements-add');
					popover.find('input[name=lvl_1_id]').val(lvl_1_id);
					popover.find('input[name=lvl_2_id]').val(lvl_2_id);
					popover.find('input[name=lvl_3_id]').val(lvl_3_id);
					popover.find('input[name=lvl_1_code]').val(lvl_1_code);
					popover.find('input[name=lvl_2_code]').val(lvl_2_code);
					popover.find('input[name=lvl_3_code]').val(lvl_3_code);
					popover.find('input[name=lvl_1_name]').val(lvl_1_name);
					popover.find('input[name=lvl_2_name]').val(lvl_2_name);
					popover.find('input[name=lvl_3_name]').val(lvl_3_name);
				},
				container: '.navbar-body'
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
		$('#account-elements').on('click', '.view', function(){
			$('body').on('hidden.bs.popover', function (e) {
			    $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
			});
			var data = acc_elements.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('acc-elements-view');
					return 'right';
				},
				content: function(){
					return $('#view-acc-elements-popover').html();
				},
				callback: function(){
					$('#acc-elements-view-code').val(data.lvl_1_code);
					$('#acc-elements-view-name').val(data.lvl_1_name);
				},
				container: '.navbar-body'
			}).on('show.bs.popover', function(){
				$('.popover').not(this).popover('hide');
				$('.card-body button').attr('disabled', true);
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
			initNumberValidation();
		});
		$('#account-elements').on('click', '.edit', function(){
			$('body').on('hidden.bs.popover', function (e) {
			    $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
			});
			var data = acc_elements.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('acc-elements-edit');
					return 'right';
				},
				content: function(){
					return $('#edit-acc-elements-popover').html();
				},
				callback: function(){
					$('#acc-elements-edit-code').val(data.lvl_1_code);
					$('#acc-elements-edit-name').val(data.lvl_1_name);
					$('#acc-elements-edit-id').val(data.lvl_1_id);

					var popover = $('.popover.acc-elements-edit');
					popover.find('input[name=lvl_1_id]').val(lvl_1_id);
					popover.find('input[name=lvl_2_id]').val(lvl_2_id);
					popover.find('input[name=lvl_3_id]').val(lvl_3_id);
					popover.find('input[name=lvl_1_code]').val(lvl_1_code);
					popover.find('input[name=lvl_2_code]').val(lvl_2_code);
					popover.find('input[name=lvl_3_code]').val(lvl_3_code);
					popover.find('input[name=lvl_1_name]').val(lvl_1_name);
					popover.find('input[name=lvl_2_name]').val(lvl_2_name);
					popover.find('input[name=lvl_3_name]').val(lvl_3_name);
				},
				container: '.navbar-body'
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
		$('#account-elements').on('click', '.update', function(){
			var data = acc_elements.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('acc-elements-update');
					return 'right';
				},
				content: function(){
					return $('#update-acc-elements-popover').html();
				},
				callback: function(){
					$('#acc-elements-update-code').val(data.lvl_1_code);
					$('#acc-elements-update-name').val(data.lvl_1_name);
					$('#acc-elements-update-id').val(data.lvl_1_id);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
		});
		$('#account-elements').on('click', '.delete', function(){
			var data = acc_elements.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('acc-elements-delete');
					return 'right';
				},
				content: function(){
					return $('#delete-acc-elements-popover').html();
				},
				callback: function(){
					$('#acc-elements-delete-code').val(data.lvl_1_code);
					$('#acc-elements-delete-name').val(data.lvl_1_name);
					$('#acc-elements-delete-id').val(data.lvl_1_id);

					var popover = $('.popover.acc-elements-delete');
					popover.find('input[name=lvl_1_id]').val(lvl_1_id);
					popover.find('input[name=lvl_2_id]').val(lvl_2_id);
					popover.find('input[name=lvl_3_id]').val(lvl_3_id);
					popover.find('input[name=lvl_1_code]').val(lvl_1_code);
					popover.find('input[name=lvl_2_code]').val(lvl_2_code);
					popover.find('input[name=lvl_3_code]').val(lvl_3_code);
					popover.find('input[name=lvl_1_name]').val(lvl_1_name);
					popover.find('input[name=lvl_2_name]').val(lvl_2_name);
					popover.find('input[name=lvl_3_name]').val(lvl_3_name);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
		});
// ACCOUNT CLASSIFICATION POPOVER
		$('#add-acc-classification').click(function(){
			$('body').on('hidden.bs.popover', function (e) {
			    $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
			});
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('acc-classification-add');
					return 'right';
				},
				content: function(){
					return $('#add-acc-classification-popover').html();
				},
				callback: function(){
					$('#add-lvl2-lvl1-code').val(lvl_1_code);
					$('#acc-classification-add-elements-value').val(lvl_1_id);
					$('#acc-classification-add-elements').val(lvl_1_id);
					$('#acc-classification-add-elements').selectize({
						create: false,
						sortField: {
							field: 'text',
							direction: 'asc'
						},
						dropdownParent: 'body',
						onChange: function(){
							var val = $('#acc-classification-add-elements').val();
							var code = $('#add-acc-classification-popover #acc-classification-add-elements').find("option[value="+val+"]").attr('code');
							$('#add-lvl2-lvl1-code').val(code);
						},
					});

					var popover = $('.popover.acc-classification-add');
					popover.find('input[name=lvl_1_id]').val(lvl_1_id);
					popover.find('input[name=lvl_2_id]').val(lvl_2_id);
					popover.find('input[name=lvl_3_id]').val(lvl_3_id);
					popover.find('input[name=lvl_1_code]').val(lvl_1_code);
					popover.find('input[name=lvl_2_code]').val(lvl_2_code);
					popover.find('input[name=lvl_3_code]').val(lvl_3_code);
					popover.find('input[name=lvl_1_name]').val(lvl_1_name);
					popover.find('input[name=lvl_2_name]').val(lvl_2_name);
					popover.find('input[name=lvl_3_name]').val(lvl_3_name);
				},
				container: '.navbar-body'
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
		$('#account-classification').on('click', '.view', function(){
			$('body').on('hidden.bs.popover', function (e) {
			    $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
			});
			var data = acc_classification.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('acc-classification-view');
					return 'right';
				},
				content: function(){
					return $('#view-acc-classification-popover').html();
				},
				callback: function(){
					$('#acc-classification-view-code').val(data.lvl_2_code);
					$('#acc-classification-view-name').val(data.lvl_2_name);
					$('#acc-classification-view-elements').val(data.lvl_1_id);
					$('#view-lvl2-lvl1-code').val(data.lvl_1_code);
					$('#acc-classification-view-elements').selectize({
						create: false,
						sortField: {
							field: 'text',
							direction: 'asc'
						},
						dropdownParent: 'body'
					});
				},
				container: '.navbar-body'
			}).on('show.bs.popover', function(){
				$('.popover').not(this).popover('hide');
				$('.card-body button').attr('disabled', true);
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
			initNumberValidation();
		});
		$('#account-classification').on('click', '.edit', function(){
			$('body').on('hidden.bs.popover', function (e) {
			    $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
			});
			var data = acc_classification.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('acc-classification-edit');
					return 'right';
				},
				content: function(){
					return $('#edit-acc-classification-popover').html();
				},
				callback: function(){
					$('#acc-classification-edit-code').val(data.lvl_2_code);
					$('#acc-classification-edit-name').val(data.lvl_2_name);
					$('#acc-classification-edit-id').val(data.lvl_2_id);
					$('#acc-classification-edit-join-id').val(data.coalvl12_id);
					$('#acc-classification-edit-elements').val(data.lvl_1_id);
					$('#edit-lvl2-lvl1-code').val(data.lvl_1_code);
					$('#acc-classification-edit-elements-value').val(lvl_1_id);
					$('#acc-classification-edit-elements').selectize({
						create: false,
						sortField: {
							field: 'text',
							direction: 'asc'
						},
						dropdownParent: null,
						onChange: function(){
							var val = $('#acc-classification-edit-elements').val();
							var code = $('#edit-acc-classification-popover #acc-classification-edit-elements').find("option[value="+val+"]").attr('code');
							$('#edit-lvl2-lvl1-code').val(code);
						},
					});

					var popover = $('.popover.acc-classification-edit');
					popover.find('input[name=lvl_1_id]').val(lvl_1_id);
					popover.find('input[name=lvl_2_id]').val(lvl_2_id);
					popover.find('input[name=lvl_3_id]').val(lvl_3_id);
					popover.find('input[name=lvl_1_code]').val(lvl_1_code);
					popover.find('input[name=lvl_2_code]').val(lvl_2_code);
					popover.find('input[name=lvl_3_code]').val(lvl_3_code);
					popover.find('input[name=lvl_1_name]').val(lvl_1_name);
					popover.find('input[name=lvl_2_name]').val(lvl_2_name);
					popover.find('input[name=lvl_3_name]').val(lvl_3_name);
				},
				container: '.navbar-body'
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
		$('#account-classification').on('click', '.update', function(){
			var data = acc_classification.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('acc-classification-update');
					return 'right';
				},
				content: function(){
					return $('#update-acc-classification-popover').html();
				},
				callback: function(){
					console.log(data);
					$('#acc-classification-update-code').val(data.lvl_2_code);
					$('#acc-classification-update-name').val(data.lvl_2_name);
					$('#acc-classification-update-id').val(data.lvl_2_id);
					$('#acc-classification-update-join-id').val(data.coalvl12_id);
					$('#acc-classification-update-elements').val(data.lvl_1_id);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
			$('#acc-classification-update-elements').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body'
			});
		});
		$('#account-classification').on('click', '.delete', function(){
			var data = acc_classification.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('acc-classification-delete');
					return 'right';
				},
				content: function(){
					return $('#delete-acc-classification-popover').html();
				},
				callback: function(){
					$('#acc-classification-delete-code').val(data.lvl_2_code);
					$('#acc-classification-delete-name').val(data.lvl_2_name);
					$('#acc-classification-delete-id').val(data.lvl_2_id);
					$('#acc-classification-delete-join-id').val(data.coalvl12_id);
					$('#acc-classification-delete-elements').val(data.lvl_1_id);
					$('#delete-lvl2-lvl1-code').val(data.lvl_1_code);
					$('#acc-classification-delete-elements').selectize({
						create: false,
						sortField: {
							field: 'text',
							direction: 'asc'
						},
						dropdownParent: 'body'
					});

					var popover = $('.popover.acc-classification-delete');
					popover.find('input[name=lvl_1_id]').val(lvl_1_id);
					popover.find('input[name=lvl_2_id]').val(lvl_2_id);
					popover.find('input[name=lvl_3_id]').val(lvl_3_id);
					popover.find('input[name=lvl_1_code]').val(lvl_1_code);
					popover.find('input[name=lvl_2_code]').val(lvl_2_code);
					popover.find('input[name=lvl_3_code]').val(lvl_3_code);
					popover.find('input[name=lvl_1_name]').val(lvl_1_name);
					popover.find('input[name=lvl_2_name]').val(lvl_2_name);
					popover.find('input[name=lvl_3_name]').val(lvl_3_name);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
		});
// LINE ITEMS POPOVER
		$('#add-line-items').click(function(){
			$('body').on('hidden.bs.popover', function (e) {
			    $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
			});
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('line-items-add');
					return 'right';
				},
				content: function(){
					return $('#add-line-items-popover').html();
				},
				callback: function(){
					$('#add-lvl3-lvl2-code').val(lvl_2_code);
					$('#line-items-add-classfication-value').val(lvl_2_id);
					$('#line-items-add-classfication').val(lvl_2_id);
					$('#line-items-add-classfication').selectize({
						create: false,
						sortField: {
							field: 'text',
							direction: 'asc'
						},
						dropdownParent: 'body',
						onChange: function(){
							var val = $('#line-items-add-classfication').val();
							var code = $('#add-line-items-popover #line-items-add-classfication').find("option[value="+val+"]").attr('code');
							$('#add-lvl3-lvl2-code').val(code);
						},
					});

					var popover = $('.popover.line-items-add');
					popover.find('input[name=lvl_1_id]').val(lvl_1_id);
					popover.find('input[name=lvl_2_id]').val(lvl_2_id);
					popover.find('input[name=lvl_3_id]').val(lvl_3_id);
					popover.find('input[name=lvl_1_code]').val(lvl_1_code);
					popover.find('input[name=lvl_2_code]').val(lvl_2_code);
					popover.find('input[name=lvl_3_code]').val(lvl_3_code);
					popover.find('input[name=lvl_1_name]').val(lvl_1_name);
					popover.find('input[name=lvl_2_name]').val(lvl_2_name);
					popover.find('input[name=lvl_3_name]').val(lvl_3_name);
				},
				container: '.navbar-body'
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
		$('#line-items').on('click', '.view', function(){
			$('body').on('hidden.bs.popover', function (e) {
			    $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
			});
			var data = line_items.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('line-items-view');
					return 'right';
				},
				content: function(){
					return $('#view-line-items-popover').html();
				},
				callback: function(){
					$('#line-items-view-code').val(data.lvl_3_code);
					$('#line-items-view-name').val(data.lvl_3_name);
					$('#line-items-view-bir').val(data.lvl_3_bir);
					$('#line-items-view-classfication').val(data.lvl_2_id);
					$('#view-lvl3-lvl2-code').val(data.lvl_2_code);
					$('#line-items-view-classfication').selectize({
						create: false,
						sortField: {
							field: 'text',
							direction: 'asc'
						},
						dropdownParent: 'body'
					});
				},
				container: '.navbar-body'
			}).on('show.bs.popover', function(){
				$('.popover').not(this).popover('hide');
				$('.card-body button').attr('disabled', true);
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
			initNumberValidation();
		});
		$('#line-items').on('click', '.edit', function(){
			$('body').on('hidden.bs.popover', function (e) {
			    $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
			});
			var data = line_items.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('line-items-edit');
					return 'right';
				},
				content: function(){
					return $('#edit-line-items-popover').html();
				},
				callback: function(){
					$('#line-items-edit-code').val(data.lvl_3_code);
					$('#line-items-edit-name').val(data.lvl_3_name);
					$('#line-items-edit-bir').val(data.lvl_3_bir);
					$('#line-items-edit-id').val(data.lvl_3_id);
					$('#line-items-edit-join-id').val(data.coalvl23_id);
					$('#line-items-edit-classfication').val(data.lvl_2_id);
					$('#edit-lvl3-lvl2-code').val(data.lvl_2_code);
					$('#line-items-edit-classfication-value').val(lvl_2_id);
					$('#line-items-edit-classfication').selectize({
						create: false,
						sortField: {
							field: 'text',
							direction: 'asc'
						},
						dropdownParent: 'body',
						onChange: function(){
							var val = $('#line-items-edit-classfication').val();
							var code = $('#edit-line-items-popover #line-items-edit-classfication').find("option[value="+val+"]").attr('code');
							$('#edit-lvl3-lvl2-code').val(code);
						},
					});

					var popover = $('.popover.line-items-edit');
					popover.find('input[name=lvl_1_id]').val(lvl_1_id);
					popover.find('input[name=lvl_2_id]').val(lvl_2_id);
					popover.find('input[name=lvl_3_id]').val(lvl_3_id);
					popover.find('input[name=lvl_1_code]').val(lvl_1_code);
					popover.find('input[name=lvl_2_code]').val(lvl_2_code);
					popover.find('input[name=lvl_3_code]').val(lvl_3_code);
					popover.find('input[name=lvl_1_name]').val(lvl_1_name);
					popover.find('input[name=lvl_2_name]').val(lvl_2_name);
					popover.find('input[name=lvl_3_name]').val(lvl_3_name);
				},
				container: '.navbar-body'
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
		$('#line-items').on('click', '.update', function(){
			var data = line_items.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('line-items-update');
					return 'right';
				},
				content: function(){
					return $('#update-line-items-popover').html();
				},
				callback: function(){
					$('#line-items-update-code').val(data.lvl_3_code);
					$('#line-items-update-name').val(data.lvl_3_name);
					$('#line-items-update-id').val(data.lvl_3_id);
					$('#line-items-update-join-id').val(data.coalvl23_id);
					$('#line-items-update-classfication').val(data.lvl_2_id);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
			$('#line-items-update-classfication').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body'
			});
		});
		$('#line-items').on('click', '.delete', function(){
			var data = line_items.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('line-items-delete');
					return 'right';
				},
				content: function(){
					return $('#delete-line-items-popover').html();
				},
				callback: function(){
					$('#line-items-delete-code').val(data.lvl_3_code);
					$('#line-items-delete-name').val(data.lvl_3_name);
					$('#line-items-delete-bir').val(data.lvl_3_bir);
					$('#line-items-delete-id').val(data.lvl_3_id);
					$('#line-items-delete-join-id').val(data.coalvl23_id);
					$('#line-items-delete-classfication').val(data.lvl_2_id);
					$('#delete-lvl3-lvl2-code').val(data.lvl_2_code);
					$('#line-items-delete-classfication').selectize({
						create: false,
						sortField: {
							field: 'text',
							direction: 'asc'
						},
						dropdownParent: 'body'
					});

					var popover = $('.popover.line-items-delete');
					popover.find('input[name=lvl_1_id]').val(lvl_1_id);
					popover.find('input[name=lvl_2_id]').val(lvl_2_id);
					popover.find('input[name=lvl_3_id]').val(lvl_3_id);
					popover.find('input[name=lvl_1_code]').val(lvl_1_code);
					popover.find('input[name=lvl_2_code]').val(lvl_2_code);
					popover.find('input[name=lvl_3_code]').val(lvl_3_code);
					popover.find('input[name=lvl_1_name]').val(lvl_1_name);
					popover.find('input[name=lvl_2_name]').val(lvl_2_name);
					popover.find('input[name=lvl_3_name]').val(lvl_3_name);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
		});
// Account Subclassification POPOVER
		$('#add-acc-sub').click(function(){
			$('body').on('hidden.bs.popover', function (e) {
			    $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
			});
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('acc-sub-add');
					return 'right';
				},
				content: function(){
					return $('#add-acc-sub-popover').html();
				},
				callback: function(){
					$('#add-lvl4-lvl3-code').val(lvl_3_code);
					$('#acc-sub-add-line-item-value').val(lvl_3_id);
					$('#acc-sub-add-line-item').val(lvl_3_id);
					$('#acc-sub-add-line-item').selectize({
						create: false,
						sortField: {
							field: 'text',
							direction: 'asc'
						},
						dropdownParent: 'body',
						onChange: function(){
							var val = $('#acc-sub-add-line-item').val();
							var code = $('#add-acc-sub-popover #acc-sub-add-line-item').find("option[value="+val+"]").attr('code');
							$('#add-lvl4-lvl3-code').val(code);
						},
					});

					var popover = $('.popover.acc-sub-add');
					popover.find('input[name=lvl_1_id]').val(lvl_1_id);
					popover.find('input[name=lvl_2_id]').val(lvl_2_id);
					popover.find('input[name=lvl_3_id]').val(lvl_3_id);
					popover.find('input[name=lvl_1_code]').val(lvl_1_code);
					popover.find('input[name=lvl_2_code]').val(lvl_2_code);
					popover.find('input[name=lvl_3_code]').val(lvl_3_code);
					popover.find('input[name=lvl_1_name]').val(lvl_1_name);
					popover.find('input[name=lvl_2_name]').val(lvl_2_name);
					popover.find('input[name=lvl_3_name]').val(lvl_3_name);
				},
				container: '.navbar-body'
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
		$('#account-subclassification').on('click', '.view', function(){
			$('body').on('hidden.bs.popover', function (e) {
			    $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
			});
			var data = account_subclassification.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('acc-sub-view');
					return 'right';
				},
				content: function(){
					return $('#view-acc-sub-popover').html();
				},
				callback: function(){
					$('#acc-sub-view-code').val(data.lvl_4_code);
					$('#acc-sub-view-name').val(data.lvl_4_name);
					$('#acc-sub-view-line-item').val(data.lvl_3_id);
					$('#view-lvl4-lvl3-code').val(data.lvl_3_code);
					$('#acc-sub-view-line-item').selectize({
						create: false,
						sortField: {
							field: 'text',
							direction: 'asc'
						},
						dropdownParent: 'body'
					});
				},
				container: '.navbar-body'
			}).on('show.bs.popover', function(){
				$('.popover').not(this).popover('hide');
				$('.card-body button').attr('disabled', true);
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
			initNumberValidation();
		});
		$('#account-subclassification').on('click', '.edit', function(){
			$('body').on('hidden.bs.popover', function (e) {
			    $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
			});
			var data = account_subclassification.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('acc-sub-edit');
					return 'right';
				},
				content: function(){
					return $('#edit-acc-sub-popover').html();
				},
				callback: function(){
					$('#acc-sub-edit-code').val(data.lvl_4_code);
					$('#acc-sub-edit-name').val(data.lvl_4_name);
					$('#acc-sub-edit-id').val(data.lvl_4_id);
					$('#acc-sub-edit-join-id').val(data.coalvl34_id);
					$('#acc-sub-edit-line-item').val(data.lvl_3_id);
					$('#edit-lvl4-lvl3-code').val(data.lvl_3_code);
					$('#acc-sub-edit-line-item-val').val(lvl_3_id);
					$('#edit-lvl4-lvl3-code').val(lvl_3_code);
					$('#acc-sub-edit-line-item-value').val(lvl_3_id);
					$('#acc-sub-edit-line-item').selectize({
						create: false,
						sortField: {
							field: 'text',
							direction: 'asc'
						},
						dropdownParent: 'body',
						onChange: function(){
							var val = $('#acc-sub-edit-line-item').val();
							var code = $('#edit-acc-sub-popover #acc-sub-edit-line-item').find("option[value="+val+"]").attr('code');
							$('#edit-lvl4-lvl3-code').val(code);
						},
					});

					var popover = $('.popover.acc-sub-edit');
					popover.find('input[name=lvl_1_id]').val(lvl_1_id);
					popover.find('input[name=lvl_2_id]').val(lvl_2_id);
					popover.find('input[name=lvl_3_id]').val(lvl_3_id);
					popover.find('input[name=lvl_1_code]').val(lvl_1_code);
					popover.find('input[name=lvl_2_code]').val(lvl_2_code);
					popover.find('input[name=lvl_3_code]').val(lvl_3_code);
					popover.find('input[name=lvl_1_name]').val(lvl_1_name);
					popover.find('input[name=lvl_2_name]').val(lvl_2_name);
					popover.find('input[name=lvl_3_name]').val(lvl_3_name);
				},
				container: '.navbar-body'
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
		$('#account-subclassification').on('click', '.update', function(){
			$('body').on('hidden.bs.popover', function (e) {
			    $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
			});
			var data = account_subclassification.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('acc-sub-update');
					return 'right';
				},
				content: function(){
					return $('#update-acc-sub-popover').html();
				},
				callback: function(){
					$('#acc-sub-update-code').val(data.lvl_4_code);
					$('#acc-sub-update-name').val(data.lvl_4_name);
					$('#acc-sub-update-id').val(data.lvl_4_id);
					$('#acc-sub-update-join-id').val(data.coalvl34_id);
					$('#acc-sub-update-line-item').val(data.lvl_3_id);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
			$('#acc-sub-update-line-item').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body'
			});
		});
		$('#account-subclassification').on('click', '.delete', function(){
			var data = account_subclassification.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('acc-sub-delete');
					return 'right';
				},
				content: function(){
					return $('#delete-acc-sub-popover').html();
				},
				callback: function(){
					$('#acc-sub-delete-code').val(data.lvl_4_code);
					$('#acc-sub-delete-name').val(data.lvl_4_name);
					$('#acc-sub-delete-id').val(data.lvl_4_id);
					$('#acc-sub-delete-join-id').val(data.coalvl34_id);
					$('#acc-sub-delete-line-item').val(data.lvl_3_id);
					$('#delete-lvl4-lvl3-code').val(lvl_3_code);
					$('#acc-sub-delete-line-item').selectize({
						create: false,
						sortField: {
							field: 'text',
							direction: 'asc'
						},
						dropdownParent: 'body'
					});
					var popover = $('.popover.acc-sub-delete');
					popover.find('input[name=lvl_1_id]').val(lvl_1_id);
					popover.find('input[name=lvl_2_id]').val(lvl_2_id);
					popover.find('input[name=lvl_3_id]').val(lvl_3_id);
					popover.find('input[name=lvl_1_code]').val(lvl_1_code);
					popover.find('input[name=lvl_2_code]').val(lvl_2_code);
					popover.find('input[name=lvl_3_code]').val(lvl_3_code);
					popover.find('input[name=lvl_1_name]').val(lvl_1_name);
					popover.find('input[name=lvl_2_name]').val(lvl_2_name);
					popover.find('input[name=lvl_3_name]').val(lvl_3_name);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
		});
// BIR CLASSIFICATION POPOVER
		$('#add-bir').click(function(){
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('bir-add');
					return 'right';
				},
				content: function(){
					return $('#add-bir-popover').html();
					return 'right';
				},
				callback: function(){},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
		});
		$('#bir-classification').on('click', '.view', function(){
			var data = bir_classification.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('bir-view');
					return 'right';
				},
				content: function(){
					return $('#view-bir-popover').html();
				},
				callback: function(){
					$('#bir-view-code').val(data.bir_code);
					$('#bir-view-name').val(data.bir_classification);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
		});
		$('#bir-classification').on('click', '.edit', function(){
			var data = bir_classification.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('bir-edit');
					return 'right';
				},
				content: function(){
					return $('#edit-bir-popover').html();
				},
				callback: function(){
					$('#bir-edit-code').val(data.bir_code);
					$('#bir-edit-name').val(data.bir_classification);
					$('#bir-edit-id').val(data.bir_id);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
		});
		$('#bir-classification').on('click', '.update', function(){
			var data = bir_classification.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('bir-update');
					return 'right';
				},
				content: function(){
					return $('#update-bir-popover').html();
				},
				callback: function(){
					$('#bir-update-code').val(data.bir_code);
					$('#bir-update-name').val(data.bir_classification);
					$('#bir-update-id').val(data.bir_id);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
		});
		$('#bir-classification').on('click', '.delete', function(){
			var data = bir_classification.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('bir-delete');
					return 'right';
				},
				content: function(){
					return $('#delete-bir-popover').html();
				},
				callback: function(){
					$('#bir-delete-code').val(data.bir_code);
					$('#bir-delete-name').val(data.bir_classification);
					$('#bir-delete-id').val(data.bir_id);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
		});
// CHART OF ACCOUNTS
		$('#add-coa').click(function(){
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
				callback: function(){},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();

			$('#coa-add-bir').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body'
			});

			$('#coa-add-acc-sub').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body'
			});

			$('#coa-add-acc-sub').change(function(){
				$('#coa-add-code').val($('#coa_add_acc_sub_'+$(this).val()).attr('final-code'));
				$('#coa-add-lvl-1').val($('#coa_add_acc_sub_'+$(this).val()).attr('lvl1'));
				$('#coa-add-lvl-2').val($('#coa_add_acc_sub_'+$(this).val()).attr('lvl2'));
				$('#coa-add-lvl-3').val($('#coa_add_acc_sub_'+$(this).val()).attr('lvl3'));
				$('#coa-add-lvl-4').val($('#coa_add_acc_sub_'+$(this).val()).attr('lvl4'));
			});
		});
		$('#coa').on('click', '.view', function(){
			var data = coa.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('coa-view');
					return 'right';
				},
				content: function(){
					return $('#view-coa-popover').html();
				},
				callback: function(){
					$('#coa-view-name').val(data.coa_name);
					$('#coa-view-acc-sub').val(data.lvl_4_id);
					$('#coa-view-code').val(data.lvl_1_code+''+data.lvl_2_code+''+data.lvl_3_code+''+data.lvl_4_code);
					$('#coa-view-bir').val(data.bir_id);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();
		});
		$('#coa').on('click', '.edit', function(){
			var data = coa.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('coa-edit');
					return 'right';
				},
				content: function(){
					return $('#edit-coa-popover').html();
				},
				callback: function(){
					$('#coa-edit-name').val(data.coa_name);
					$('#coa-edit-acc-sub').val(data.lvl_4_id);
					$('#coa-edit-code').val(data.lvl_1_code+''+data.lvl_2_code+''+data.lvl_3_code+''+data.lvl_4_code);
					$('#coa-edit-bir').val(data.bir_id);
					$('#coa-edit-id').val(data.coa_id);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();

			$('#coa-edit-bir').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body'
			});

			$('#coa-edit-acc-sub').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body'
			});

			$('#coa-edit-acc-sub').change(function(){
				$('#coa-edit-code').val($('#coa_edit_acc_sub_'+$(this).val()).attr('final-code'));
				$('#coa-edit-lvl-1').val($('#coa_edit_acc_sub_'+$(this).val()).attr('lvl1'));
				$('#coa-edit-lvl-2').val($('#coa_edit_acc_sub_'+$(this).val()).attr('lvl2'));
				$('#coa-edit-lvl-3').val($('#coa_edit_acc_sub_'+$(this).val()).attr('lvl3'));
				$('#coa-edit-lvl-4').val($('#coa_edit_acc_sub_'+$(this).val()).attr('lvl4'));
			});
		});
		$('#coa').on('click', '.update', function(){
			var data = coa.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('coa-update');
					return 'right';
				},
				content: function(){
					return $('#update-coa-popover').html();
				},
				callback: function(){
					$('#coa-update-name').val(data.coa_name);
					$('#coa-update-acc-sub').val(data.lvl_4_id);
					$('#coa-update-code').val(data.lvl_1_code+''+data.lvl_2_code+''+data.lvl_3_code+''+data.lvl_4_code);
					$('#coa-update-bir').val(data.bir_id);
					$('#coa-update-id').val(data.coa_id);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();

			$('#coa-update-bir').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body'
			});

			$('#coa-update-acc-sub').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body'
			});

			$('#coa-update-acc-sub').change(function(){
				$('#coa-update-code').val($('#coa_update_acc_sub_'+$(this).val()).attr('final-code'));
				$('#coa-update-lvl-1').val($('#coa_update_acc_sub_'+$(this).val()).attr('lvl1'));
				$('#coa-update-lvl-2').val($('#coa_update_acc_sub_'+$(this).val()).attr('lvl2'));
				$('#coa-update-lvl-3').val($('#coa_update_acc_sub_'+$(this).val()).attr('lvl3'));
				$('#coa-update-lvl-4').val($('#coa_update_acc_sub_'+$(this).val()).attr('lvl4'));
			});
		});
		$('#coa').on('click', '.delete', function(){
			var data = coa.row(this.closest('tr')).data();
			$(this).popover({
				animation: true,
				html: true,
				placement: function(context, src){
					$(context).addClass('coa-delete');
					return 'right';
				},
				content: function(){
					return $('#delete-coa-popover').html();
				},
				callback: function(){
					$('#coa-delete-name').val(data.coa_name);
					$('#coa-delete-acc-sub').val(data.lvl_4_id);
					$('#coa-delete-code').val(data.lvl_1_code+''+data.lvl_2_code+''+data.lvl_3_code+''+data.lvl_4_code);
					$('#coa-delete-bir').val(data.bir_id);
					$('#coa-delete-id').val(data.coa_id);
				},
				container: '.navbar-body'
			});
			$(this).popover('toggle');
			initRipple();
			no_space();

			$('#coa-delete-bir').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body'
			});

			$('#coa-delete-acc-sub').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body'
			});
		});
// CLOSE BTN
		$('div').on('click', '.close-popover', function(){
	        $('.popover').popover('hide');
	        $('.card-body button').removeAttr('disabled');
	    });

	});
</script>