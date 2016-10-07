<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/company_settings/products_seq.js"></script>
<script>
    $(document).ready(function(){
        var seq = 0;
        var table_summary = $('#products-summary-table').DataTable({
            ajax: window.location.origin+'/company_settings/products/get',
            columns:[
                        {
                            mRender: function(data, type, full){
                                return seq += 1;
                            }
                        }, 
                        {'data': 'co_p_code'}, {'data': 'co_p_name'}, {'data': 'co_p_shortname'}, {'data': 'co_p_description'}, {'data': 'co_pcc_name'}, {'data': 'co_de_name'}
                    ],
            columnDefs: [{targets: 0, width: '100px'}, {targets: [1,2], width: '40px'}],
            order: [['1', 'asc']],
            scrollX: true,
            initComplete: function(json, src){
                seq = 0;
                initRipple();
            }
        });
        var table = $('#products-table').DataTable({
            ajax: window.location.origin+'/company_settings/products/get',
            columns:[
                        {
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
                        {'data': 'co_p_code'}, {'data': 'co_p_name'}, {'data': 'co_p_shortname'}, {'data': 'co_p_description'}, {'data': 'co_pcc_name'}, {'data': 'co_de_name'}
                    ],
            columnDefs: [{targets: 0, width: '100px'}, {targets: [1,2], width: '40px'}],
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
        $('#products-table').on('click', '.view', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            let seq = $(this.closest('tr')).find('td:eq(1)').text();
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context,src){
                    $(context).addClass('view-modal-body');
                    return 'right';
                },
                content: function(){
                    return $('#view-popover').html();
                },
                callback: function(){
                    $('#view-seq').val(seq);
                    $('#view-code').val(data.co_p_code);
                    $('#view-name').val(data.co_p_name);
                    $('#view-shortname').val(data.co_p_shortname);
                    $('#view-description').val(data.co_p_description);
                    $('#view-profit-cost-center').val(data.co_pcc_name);
                    $('#view-department').val(data.co_de_name);
                },
                container:'.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
        });
        $('#products-table').on('click', '.edit', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            let seq = $(this.closest('tr')).find('td:eq(1)').text();
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context, src){
                    $(context).addClass('edit-modal-body');
                    return 'src';
                },
                content: function(){
                    return $('#edit-popover').html();
                },
                callback: function(){
                    $('#edit-seq').val(seq);
                    $('#edit-name').val(data.co_p_name);
                    $('#edit-shortname').val(data.co_p_shortname);
                    $('#edit-description').val(data.co_p_description);
                    $('#edit-profit-cost-center').val(data.co_pcc_name);
                    $('#edit-department').val(data.co_de_name);
                    $('#edit-id').val(data.co_p_id);
                    $('#edit-profit-cost-center-id').val(data.co_pcc_id);
                    $('#edit-profit-cost-center-code').val(data.co_pcc_code);
                    $('#edit-department-code').val(data.co_de_code);
                    $('#edit-department-id').val(data.co_de_id);
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
        $('#products-table').on('click', '.update', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            let seq = $(this.closest('tr')).find('td:eq(1)').text();
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context, src){
                    $(context).addClass('update-modal-body');
                    return 'right';
                },
                content: function(){
                    return $('#update-popover').html();
                },
                callback: function(){
                    $('#update-seq').val(seq);
                    $('#update-name').val(data.co_p_name);
                    $('#update-shortname').val(data.co_p_shortname);
                    $('#update-description').val(data.co_p_description);
                    $('#update-profit-cost-center').val(data.co_pcc_name);
                    $('#update-department').val(data.co_de_name);
                    $('#update-profit-cost-center-id').val(data.co_pcc_id);
                    $('#update-profit-cost-center-code').val(data.co_pcc_code);
                    $('#update-department-id').val(data.co_de_id);    
                    $('#update-department-code').val(data.co_de_code);
                    $('#update-id').val(data.co_p_id);
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
        $('div').on('click', '.select-option-profit-cost-center', function(){
            $("input[name='add-profit-cost-center']").val($(this)[0].textContent);
            $("input[name='add-profit-cost-center-id']").val($(this).attr('profit-cost-center-id'));
            $("input[name='add-profit-cost-center-code']").val($(this).attr('profit-cost-center-code'));
        });
        $('div').on('click', '.select-option-department', function(){
            $("input[name='add-department']").val($(this)[0].textContent);
            $("input[name='add-department-id']").val($(this).attr('department-id'));
            $("input[name='add-department-code']").val($(this).attr('department-code'));
        });
        $('div').on('click', '.select-option-profit-cost-center', function(){
            $("input[name='edit-profit-cost-center']").val($(this)[0].textContent);
            $("input[name='edit-profit-cost-center-id']").val($(this).attr('profit-cost-center-id'));
            $("input[name='edit-profit-cost-center-code']").val($(this).attr('profit-cost-center-code'));
        });
        $('div').on('click', '.select-option-department', function(){
            $("input[name='edit-department']").val($(this)[0].textContent);
            $("input[name='edit-department-id']").val($(this).attr('department-id'));
            $("input[name='edit-department-code']").val($(this).attr('department-code'));
        });
        $('div').on('click', '.select-option-profit-cost-center', function(){
            $("input[name='update-profit-cost-center']").val($(this)[0].textContent);
            $("input[name='update-profit-cost-center-id']").val($(this).attr('profit-cost-center-id'));
            $("input[name='update-profit-cost-center-code']").val($(this).attr('profit-cost-center-code'));
        });
        $('div').on('click', '.select-option-department', function(){
            $("input[name='update-department']").val($(this)[0].textContent);
            $("input[name='update-department-id']").val($(this).attr('department-id'));
            $("input[name='update-department-code']").val($(this).attr('department-code'));
        });
        $('.navbar-body').on('click', '.add-profit-cost-center-btn', function(){
            $('#add-options').html($('#p-profit-cost-center-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.add-department-btn', function(){
            $('#add-options').html($('#p-department-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.edit-profit-cost-center-btn', function(){
            $('#edit-options').html($('#p-profit-cost-center-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.edit-department-btn', function(){
            $('#edit-options').html($('#p-department-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.update-profit-cost-center-btn', function(){
            $('#update-options').html($('#p-profit-cost-center-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.update-department-btn', function(){
            $('#update-options').html($('#p-department-select').html());
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