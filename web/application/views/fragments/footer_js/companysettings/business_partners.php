<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/company_settings/business_partners_seq.js"></script>
<script>
    $(document).ready(function(){
        var seq = 0;
        var table_summary = $('#business-partners-summary-table').DataTable({
            ajax: window.location.origin+'/company_settings/business_partners/get',
            columns:[
                {
                    mRender: function(data, type, full){
                        return seq += 1;
                    }
                }, 
                {'data': 'co_bp_code'}, {'data': 'bp_name'}, {'data': 'co_bp_shortname'}, {'data': 'co_bp_bus_style'}, {'data': 'co_bp_address'}, {'data': 'co_bp_tin'}, {'data': 'co_bp_particulars'}, {'data': 'co_bp_class'}, {'data': 'bpt_type'}
            ],
            columnDefs: [{targets: 0, width: '101px'}],
            order: [['1', 'asc']],
            scrollX: true,
            initComplete: function(json, src){
                seq = 0;
                initRipple();
            }
        });
        var table = $('#business-partners-table').DataTable({
            ajax: window.location.origin+'/company_settings/business_partners/get',
            columns:[{
                mData: null, bSortable: false,
                mRender: function(data, type, full){
                    return "<button type='button' class='btn btn-primary btn-xs btn-raised view title' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                            <button type='button' class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>\n\
                            <button type='button' class='btn btn-warning btn-xs btn-raised update title' custom-title='Update'><i class='fa fa-refresh'></i></button>";
                }
            },
            {
                mRender: function(data, type, full){
                    return seq += 1;
                }
            }, 
            {'data': 'co_bp_code'}, {'data': 'bp_name'}, {'data': 'co_bp_shortname'}, {'data': 'co_bp_bus_style'}, {'data': 'co_bp_address'}, {'data': 'co_bp_tin'}, {'data': 'co_bp_particulars'}, {'data': 'co_bp_class'}, {'data': 'bpt_type'}],
            columnDefs: [{targets: 0, width: '101px'}],
            order: [['1', 'asc']],
            scrollX: true,
            initComplete: function(json, src){
                seq = 0;
                initRipple();
                init_tooltip();
            }
        });
        
        var tmp = $.fn.popover.Constructor.prototype.show;
            $.fn.popover.Constructor.prototype.show = function () {
              tmp.call(this);
              if (this.options.callback) {
                this.options.callback();
              }
        }
        
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
        $('#business-partners-table').on('click', '.view', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            let seq = $(this.closest('tr')).find('td:eq(1)').text();
            console.log(data);
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context, src){
                    $(context).addClass('view-modal-body');
                    return 'right';
                },
                content: function(){
                    return $('#view-popover').html();
                },
                callback: function(){
                    $('#view-seq').val(seq);
                    $('#view-code').val(data.co_bp_code);
                    $('#view-name').val(data.bp_name);
                    $('#view-shortname').val(data.co_bp_shortname);
                    $('#view-style').val(data.co_bp_bus_style);
                    $('#view-address').val(data.co_bp_address);
                    $('#view-tin').val(data.co_bp_tin);
                    $('#view-particulars').val(data.co_bp_particulars);
                    $('#view-class').val(data.co_bp_class);
                    $('#view-type').val(data.bpt_type);
                    $('#view-tax-1').val((data.tax_1.length > 0) ? data.tax_1[0].t_name : '');
                    $('#view-tax-2').val((data.tax_2.length > 0) ? data.tax_2[0].t_name : '');
                    $('#view-tax-3').val((data.tax_3.length > 0) ? data.tax_3[0].t_name : '');
                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
        });
        $('#business-partners-table').on('click', '.edit', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            let seq = $(this.closest('tr')).find('td:eq(1)').text();
            $(this).popover({
                animation: true,
                html: true,
                placement: 'right',
                content: function(){
                    return $('#edit-popover').html();
                },
                callback: function(){
                    $('#edit-seq').val(seq);
                    $('#edit-name').val(data.co_bp_name);
                    $('#edit-ind-name').val(data.co_bp_ind_name);
                    $('#edit-shortname').val(data.co_bp_shortname);
                    $('#edit-style').val(data.co_bp_bus_style);
                    $('#edit-address').val(data.co_bp_address);
                    $('#edit-tin').val(data.co_bp_tin);
                    $('#edit-particulars').val(data.co_bp_particulars);
                    $('#edit-class').val(data.co_bp_class);
                    $('#edit-class-code').val(data.co_bp_class_code);
                    $('#edit-type').val(data.bpt_type);
                    $('#edit-id').val(data.co_bp_id);
                    $('#edit-type-id').val(data.bpt_id);
                    $('#edit-type-code').val(data.bpt_code);
                    $('#edit-tax-1').val((data.tax_1.length > 0) ? data.tax_1[0].t_name : '');
                    $('#edit-tax-1-id').val((data.tax_1.length > 0) ? data.tax_1[0].t_id : '');
                    $('#edit-tax-1-code').val((data.tax_1.length > 0) ? data.tax_1[0].t_code : '');
                    $('#edit-tax-2').val((data.tax_2.length > 0) ? data.tax_2[0].t_name : '');
                    $('#edit-tax-2-id').val((data.tax_2.length > 0) ? data.tax_2[0].t_id : '');
                    $('#edit-tax-2-code').val((data.tax_2.length > 0) ? data.tax_2[0].t_code : '');
                    $('#edit-tax-3').val((data.tax_3.length > 0) ? data.tax_3[0].t_name : '');
                    $('#edit-tax-3-id').val((data.tax_3.length > 0) ? data.tax_3[0].t_id : '');
                    $('#edit-tax-3-code').val((data.tax_3.length > 0) ? data.tax_3[0].t_code : '');
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
        $('#business-partners-table').on('click', '.update', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            let seq = $(this.closest('tr')).find('td:eq(1)').text();
            $(this).popover({
                animation: true,
                html: true,
                placement: 'right',
                content: function(){
                    return $('#update-popover').html();
                },
                callback: function(){
                    $('#update-seq').val(seq);
                    $('#update-name').val(data.co_bp_name);
                    $('#update-ind-name').val(data.co_bp_ind_name);
                    $('#update-shortname').val(data.co_bp_shortname);
                    $('#update-style').val(data.co_bp_bus_style);
                    $('#update-address').val(data.co_bp_address);
                    $('#update-tin').val(data.co_bp_tin);
                    $('#update-particulars').val(data.co_bp_particulars);
                    $('#update-class').val(data.co_bp_class);
                    $('#update-class-code').val(data.co_bp_class_code);
                    $('#update-type').val(data.bpt_type);
                    $('#update-id').val(data.co_bp_id);
                    $('#update-type-id').val(data.bpt_id);
                    $('#update-type-code').val(data.bpt_code);
                    $('#update-tax-1').val((data.tax_1.length > 0) ? data.tax_1[0].t_name : '');
                    $('#update-tax-1-id').val((data.tax_1.length > 0) ? data.tax_1[0].t_id : '');
                    $('#update-tax-1-code').val((data.tax_1.length > 0) ? data.tax_1[0].t_code : '');
                    $('#update-tax-2').val((data.tax_2.length > 0) ? data.tax_2[0].t_name : '');
                    $('#update-tax-2-id').val((data.tax_2.length > 0) ? data.tax_2[0].t_id : '');
                    $('#update-tax-2-code').val((data.tax_2.length > 0) ? data.tax_2[0].t_code : '');
                    $('#update-tax-3').val((data.tax_3.length > 0) ? data.tax_3[0].t_name : '');
                    $('#update-tax-3-id').val((data.tax_3.length > 0) ? data.tax_3[0].t_id : '');
                    $('#update-tax-3-code').val((data.tax_3.length > 0) ? data.tax_3[0].t_code : '');
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
        $('div').on('click', '.close-popover', function(){
            $('.popover').popover('hide');
            $('.card-body button').removeAttr('disabled');
        });
        $('div').on('click', '#close-btn', function(){
            $('.popover').popover('hide');
            $('.card-body button').removeAttr('disabled');
        });
        $('div').on('click', '.select-option-class', function(){
            $("input[name='add-class']").attr('readonly', true);
            $("input[name='add-class']").val($(this)[0].textContent);
            $("input[name='add-class-id']").val($(this).attr('bpc-id'));
            $("input[name='add-class-code']").val($(this).attr('bpc-code'));
            if($(this).attr('bpc-code') === '61'){
                $("input[name='add-class']").removeAttr('readonly');
                $("input[name='add-class']").focus().select();
            }
        });
        $('div').on('click', '.select-option-type', function(){
            $("input[name='add-type']").val($(this)[0].textContent);
            $("input[name='add-type-id']").val($(this).attr('type-id'));
            $("input[name='add-type-code']").val($(this).attr('type-code'));
        });
        $('div').on('click', '.select-option-tax-1', function(){
            $("input[name='add-tax-1']").val($(this)[0].textContent);
            $("input[name='add-tax-1-id']").val($(this).attr('tax-id'));
            $("input[name='add-tax-1-code']").val($(this).attr('tax-code'));
        });
        $('div').on('click', '.select-option-tax-2', function(){
            $("input[name='add-tax-2']").val($(this)[0].textContent);
            $("input[name='add-tax-2-id']").val($(this).attr('tax-id'));
            $("input[name='add-tax-2-code']").val($(this).attr('tax-code'));
        });
        $('div').on('click', '.select-option-tax-3', function(){
            $("input[name='add-tax-3']").val($(this)[0].textContent);
            $("input[name='add-tax-3-id']").val($(this).attr('tax-id'));
            $("input[name='add-tax-3-code']").val($(this).attr('tax-code'));
        });
       $('div').on('click', '.select-option-class', function(){
            $("input[name='edit-class']").val($(this)[0].textContent);
            $("input[name='edit-class-id']").val($(this).attr('bpc-id'));
            $("input[name='edit-class-code']").val($(this).attr('bpc-code'));
        });
        $('div').on('click', '.select-option-type', function(){
            $("input[name='edit-type']").val($(this)[0].textContent);
            $("input[name='edit-type-id']").val($(this).attr('type-id'));
            $("input[name='edit-type-code']").val($(this).attr('type-code'));
        });
        $('div').on('click', '.select-option-tax-1', function(){
            $("input[name='edit-tax-1']").val($(this)[0].textContent);
            $("input[name='edit-tax-1-id']").val($(this).attr('tax-id'));
            $("input[name='edit-tax-1-code']").val($(this).attr('tax-code'));
        });
        $('div').on('click', '.select-option-tax-2', function(){
            $("input[name='edit-tax-2']").val($(this)[0].textContent);
            $("input[name='edit-tax-2-id']").val($(this).attr('tax-id'));
            $("input[name='edit-tax-2-code']").val($(this).attr('tax-code'));
        });
        $('div').on('click', '.select-option-tax-3', function(){
            $("input[name='edit-tax-3']").val($(this)[0].textContent);
            $("input[name='edit-tax-3-id']").val($(this).attr('tax-id'));
            $("input[name='edit-tax-3-code']").val($(this).attr('tax-code'));
        });
        $('div').on('click', '.select-option-class', function(){
            $("input[name='update-class']").val($(this)[0].textContent);
            $("input[name='update-class-id']").val($(this).attr('bpc-id'));
            $("input[name='update-class-code']").val($(this).attr('bpc-code'));
        });
        $('div').on('click', '.select-option-type', function(){
            $("input[name='update-type']").val($(this)[0].textContent);
            $("input[name='update-type-id']").val($(this).attr('type-id'));
            $("input[name='update-type-code']").val($(this).attr('type-code'));
        });
        $('div').on('click', '.select-option-tax-1', function(){
            $("input[name='update-tax-1']").val($(this)[0].textContent);
            $("input[name='update-tax-1-id']").val($(this).attr('tax-id'));
            $("input[name='update-tax-1-code']").val($(this).attr('tax-code'));
        });
        $('div').on('click', '.select-option-tax-2', function(){
            $("input[name='update-tax-2']").val($(this)[0].textContent);
            $("input[name='update-tax-2-id']").val($(this).attr('tax-id'));
            $("input[name='update-tax-2-code']").val($(this).attr('tax-code'));
        });
        $('div').on('click', '.select-option-tax-3', function(){
            $("input[name='update-tax-3']").val($(this)[0].textContent);
            $("input[name='update-tax-3-id']").val($(this).attr('tax-id'));
            $("input[name='update-tax-3-code']").val($(this).attr('tax-code'));
        });
        $('.navbar-body').on('click', '.add-class-btn', function(){
            $('#add-options').html($('#bp-class-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.add-type-btn', function(){
            $('#add-options').html($('#bp-type-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.add-tax-1-btn', function(){
            $('#add-options').html($('#tax-select-1').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.add-tax-2-btn', function(){
            $('#add-options').html($('#tax-select-2').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.add-tax-3-btn', function(){
            $('#add-options').html($('#tax-select-3').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.edit-class-btn', function(){
            $('#edit-options').html($('#bp-class-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.edit-type-btn', function(){
            $('#edit-options').html($('#bp-type-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.edit-tax-1-btn', function(){
            $('#edit-options').html($('#tax-select-1').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.edit-tax-2-btn', function(){
            $('#edit-options').html($('#tax-select-2').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.edit-tax-3-btn', function(){
            $('#edit-options').html($('#tax-select-3').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.update-class-btn', function(){
            $('#update-options').html($('#bp-class-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.update-type-btn', function(){
            $('#update-options').html($('#bp-type-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.update-tax-1-btn', function(){
            $('#update-options').html($('#tax-select-1').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.update-tax-2-btn', function(){
            $('#update-options').html($('#tax-select-2').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.update-tax-3-btn', function(){
            $('#update-options').html($('#tax-select-3').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.form-control', function(){
            $('#add-options').empty();
        });
         $('.navbar-body').on('click', '.form-control', function(){
            $('#edit-options').empty();
        });
        $('.navbar-body').on('click', '.form-control', function(){
            $('#update-options').empty();
        });
    });
</script>