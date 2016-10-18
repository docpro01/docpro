<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/company_settings/chart_of_accounts_seq.js"></script> -->
<script>
	$(document).ready(function(){
		var lvl_1 = [];
		var lvl_2 = [];
		var lvl_3 = [];
		var lvl_4 = [];

		var coa_summary = $('#chart-of-accounts-summary-table').DataTable({
			ajax: window.location.origin+"/company_settings/chart_of_accounts/co_coa",
			columns: [
						{'data': 'code'},
						{'data': 'name'},
						{'data': 'bir_classification'},
					],
			columnDefs: [{targets: [0], width: '100px'}],
			scrollX: true,
			order: [[1, 'asc']]
		});

		var coa = $('#chart-of-accounts-table').DataTable({
			ajax: window.location.origin+"/company_settings/chart_of_accounts/co_coa",
			columns: [
						{
							mData: null, bSortable: false,
                            mRender: function(data, type, full){
                                return "<button type='button' class='btn btn-primary btn-xs btn-raised view title' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                        <button type='button' class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>\n\
                                        <button type='button' class='btn btn-warning btn-xs btn-raised update title' custom-title='Update'><i class='fa fa-refresh'></i></button>";
                            }
						},
						{'data': 'code'},
						{'data': 'name'},
						{'data': 'bir_classification'},
					],
			columnDefs: [{targets: [0,1], width: '100px'}, {targets: 3, width: '350px'}],
			scrollX: true,
			order: [[1, 'asc']],
			initComplete: function(settings, json){
				initRipple();
				init_tooltip();
			}
		});
		

		$('#add').click(function(){
			$('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context, src){
                    $(context).addClass('add-modal-body');
                    return 'right';
                },
                content: function(){
                    return $('#add-popover').html();
                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
            initSingleSubmit();
        });

	
		$('.navbar').on('click', '.btn-cat-1', function(){
			console.log('OK');
			$('#add-cat-option').html('');
			$.get(window.location.origin+'/company_settings/chart_of_accounts/coa_lvl_1', function(response){
				lvl_1 = JSON.parse(response).data;
				console.log(lvl_1);
				$.each(lvl_1, function(index, data){
					console.log(data);
					$('#add-cat-option').append(`<button class='btn btn-default select-lvl-1 ripple-effect' type='button' style='width: 100%' lvl-id='${data.lvl_1_id}' lvl-code='${data.lvl_1_code}' lvl-name='${data.lvl_1_name}'>${data.lvl_1_name}</button>`);
				});
				initRipple();
			});
            
        });

        $('.navbar').on('click', '.btn-cat-2', function(){
			$('#add-cat-option').html('');
			lvl_2.some(function(data, index){
				$('#add-cat-option').append(`<button class='btn btn-default select-lvl-2 ripple-effect' type='button' style='width: 100%' lvl-id='${data.lvl_2_id}' lvl-code='${data.lvl_2_code}' lvl-name='${data.lvl_2_name}'>${data.lvl_2_name}</button>`);
			});
            initRipple();
        });

        $('.navbar').on('click', '.btn-cat-3', function(){
			$('#add-cat-option').html('');
			lvl_3.some(function(data, index){
				$('#add-cat-option').append(`<button class='btn btn-default select-lvl-3 ripple-effect' type='button' style='width: 100%' lvl-id='${data.lvl_3_id}' lvl-code='${data.lvl_3_code}' lvl-name='${data.lvl_3_name}'>${data.lvl_3_name}</button>`);
			});
            initRipple();
        });

        $('.navbar').on('click', '.select-lvl-1', function(){
        	var id = $(this).attr('lvl-id');
			$.post(window.location.origin+'/company_settings/chart_of_accounts/coa_lvl_2', {id: id}, function(response){
				lvl_2 = JSON.parse(response);
			});
			$('#cat-1').val($(this).attr('lvl-name'));
			$(this).closest('.popover-content').find('input[name=lvl_1_id]').val($(this).attr('lvl-id'));
			$(this).closest('.popover-content').find('input[name=lvl_1_code]').val($(this).attr('lvl-code'));
			$(this).closest('.popover-content').find('input[name=lvl_1_name]').val($(this).attr('lvl-name'));
        });

        $('.navbar').on('click', '.select-lvl-2', function(){
        	var id = $(this).attr('lvl-id');
			$.post(window.location.origin+'/company_settings/chart_of_accounts/coa_lvl_3', {id: id}, function(response){
				lvl_3 = JSON.parse(response);
			});
			$('#cat-2').val($(this).attr('lvl-name'));
			$(this).closest('.popover-content').find('input[name=lvl_2_id]').val($(this).attr('lvl-id'));
			$(this).closest('.popover-content').find('input[name=lvl_2_code]').val($(this).attr('lvl-code'));
			$(this).closest('.popover-content').find('input[name=lvl_2_name]').val($(this).attr('lvl-name'));
        });

        $('.navbar').on('click', '.select-lvl-3', function(){
			$('#cat-3').val($(this).attr('lvl-name'));
			$(this).closest('.popover-content').find('input[name=lvl_3_id]').val($(this).attr('lvl-id'));
			$(this).closest('.popover-content').find('input[name=lvl_3_code]').val($(this).attr('lvl-code'));
			$(this).closest('.popover-content').find('input[name=lvl_3_name]').val($(this).attr('lvl-name'));
        });
	
		$('div').on('click', '.close-popover', function(){
            $('.popover').popover('hide');
            $('.card-body button').removeAttr('disabled');
        });
        $('#switch-state').bootstrapSwitch();
        init_table_option(coa, $(this).closest('side-body'));
	});
</script>
