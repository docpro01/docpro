<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/company_settings/modes_of_payment_seq.js"></script>
<script>
    $(document).ready(function(){
        var seq = 0;
        var table_summary = $('#modes-of-payment-summary-table').DataTable({
            ajax: window.location.origin+'/company_settings/modes_of_payment/get',
            columns:[
                        {
                            mRender: function(data, type, full){
                                return seq += 1;
                            }
                        }, 
                        {'data': 'mop_code'}, {'data': 'mop_name'}, {'data': 'mop_shortname'}, {'data': 'top_type'}
                    ],
            columnDefs: [{targets: 0, width: '100px'}, {targets: 1, width: '80px'}],
            order: [['1', 'asc']],
            initComplete: function(json, src){
                seq = 0;
                initRipple();
            }
        });
        var table = $('#modes-of-payment-table').DataTable({
            ajax: window.location.origin+'/company_settings/modes_of_payment/get',
            columns:[
                        {
                            mData: null, bSortable: false,
                            mRender: function(data, type, full){
                                if(data.mop_id < 9){
                                    return "<button type='button' class='btn btn-primary btn-xs btn-raised view title' custom-title='View' style='width: 100%;'><i class='fa fa-eye'></i></button>";
                                }
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
                        {'data': 'mop_code'}, {'data': 'mop_name'}, {'data': 'mop_shortname'}, {'data': 'top_type'}
                    ],
            columnDefs: [{targets: 0, width: '100px'}, {targets: 1, width: '80px'}],
            order: [['1', 'asc']],
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
        $('#modes-of-payment-table').on('click', '.view', function(){
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
                    $('#view-code').val(data.mop_code);
                    $('#view-name').val(data.mop_name);
                    $('#view-shortname').val(data.mop_shortname);
                    $('#view-type').val(data.top_type);
                },
                container:'.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
        });
        $('#modes-of-payment-table').on('click', '.edit', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            let seq = $(this.closest('tr')).find('td:eq(1)').text();
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context, src){
                    $(context).addClass('edit-modal-body')
                    return 'right';
                },
                content: function(){
                    return $('#edit-popover').html();
                },
                callback: function(){
                    $('#edit-seq').val(seq);
                    $('#edit-code').val(data.mop_code);
                    $('#edit-name').val(data.mop_name);
                    $('#edit-shortname').val(data.mop_shortname);
                    $('#edit-type').val(data.top_type);
                    $('#edit-id').val(data.co_mop_id);
                    $('#edit-type-id').val(data.top_id);
                    $('#edit-type-code').val(data.top_code);
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
        $('#modes-of-payment-table').on('click', '.update', function(){
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
                    $(context).addClass('update-modal-body');
                    return 'right';
                },
                content: function(){
                    return $('#update-popover').html();
                },
                callback: function(){
                    $('#update-seq').val(seq);
                    $('#update-code').val(data.mop_code);
                    $('#update-name').val(data.mop_name);
                    $('#update-shortname').val(data.mop_shortname);
                    $('#update-type').val(data.top_type);
                    $('#update-type-id').val(data.top_id);
                    $('#update-type-code').val(data.top_code);
                    $('#update-id').val(data.co_mop_id);
                    $('#update-comop-id').val(data.co_mop_id);
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
        $('div').on('click', '.select-option', function(){
            $("input[name='add-type']").val($(this)[0].textContent);
            $("input[name='add-type-id']").val($(this).attr('type-id'));
            $("input[name='add-type-code']").val($(this).attr('type-code'));
        });
        $('div').on('click', '.select-option', function(){
            $("input[name='edit-type']").val($(this)[0].textContent);
            $("input[name='edit-type-id']").val($(this).attr('type-id'));
            $("input[name='edit-type-code']").val($(this).attr('type-code'));
        });
        $('div').on('click', '.select-option', function(){
            $("input[name='update-type']").val($(this)[0].textContent);
            $("input[name='update-type-id']").val($(this).attr('type-id'));
            $("input[name='update-type-code']").val($(this).attr('type-code'));
        });
        $('.navbar-body').on('click', '.add-type-btn', function(){
            $('#add-options').html($('#mop-type-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.edit-type-btn', function(){
            $('#edit-options').html($('#mop-type-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.update-type-btn', function(){
            $('#update-options').html($('#mop-type-select').html());
            initRipple();
        });
    });
</script>