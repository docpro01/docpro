<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/company_settings/banks_seq.js"></script>
<script>
    $(document).ready(function(){
        var seq = 0;
        var table_summary = $('#banks-summary-table').DataTable({
            ajax: window.location.origin+'/company_settings/banks/get',
            columns:[
                        {
                            mRender: function(data, type, full){
                                return seq += 1;
                            }
                        }, 
                        {'data': 'b_code'}, {'data': 'b_name'}, {'data': 'b_shortname'}, {'data': 'co_b_no'}, {'data': 'co_b_class'}
                    ],
            columnDefs: [{targets: 0, width: '100px'}, {targets: 1, width: '40px'}],
            scrollX: true,
            initComplete: function(context, src){
                seq = 0;
                initRipple();
            }
        });
        var table = $('#banks-table').DataTable({
            ajax: window.location.origin+'/company_settings/banks/get',
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
                        {'data': 'b_code'}, {'data': 'b_name'}, {'data': 'b_shortname'}, {'data': 'co_b_no'}, {'data': 'co_b_class'}
                    ],
            columnDefs: [{targets: 0, width: '100px'}, {targets: 1, width: '40px'}],
            scrollX: true,
            initComplete: function(context, src){
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
        $('#banks-table').on('click', '.view', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            let seq = $(this.closest('tr')).find('td:eq(1)').text();
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context,src){
                    $(context).addClass('view-popover');
                    return 'right';
                },
                content: function(){
                    return $('#view-popover').html();
                },
                callback: function(){
                    $('#view-seq').val(seq);
                    $('#view-code').val(data.b_code);
                    $('#view-bank').val(data.b_name);
                    $('#view-shortname').val(data.b_shortname);
                    $('#view-number').val(data.co_b_no);
                    $('#view-classification').val(data.co_b_class);
                },
                container:'.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
            initSingleSubmit();
        });
        $('#banks-table').on('click', '.edit', function(){
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
                    return 'right';
                },
                content: function(){
                    return $('#edit-popover').html();
                },
                callback: function(){
                    $('#edit-seq').val(seq);
                    $('#edit-bank').val(data.b_name);
                    $('#edit-number').val(data.co_b_no);
                    $('#edit-classification').val(data.co_b_class);
                    $('#edit-id').val(data.co_b_id);
                    $('#edit-bank-id').val(data.b_id);
                    $('#edit-bank-code').val(data.b_code);
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
        $('#banks-table').on('click', '.update', function(){
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
                    $('#update-bank').val(data.b_name);
                    $('#update-number').val(data.co_b_no);
                    $('#update-classification').val(data.co_b_class);
                    $('#update-bank-id').val(data.b_id);
                    $('#update-bank-code').val(data.b_code);
                    $('#update-id').val(data.co_b_id);
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
            $("input[name='add-bank']").val($(this)[0].textContent);
            $("input[name='add-bank-id']").val($(this).attr('bank-id'));
            $("input[name='add-bank-code']").val($(this).attr('bank-code'));
        });
        $('div').on('click', '.select-option', function(){
            $("input[name='edit-bank']").val($(this)[0].textContent);
            $("input[name='edit-bank-id']").val($(this).attr('bank-id'));
            $("input[name='edit-bank-code']").val($(this).attr('bank-code'));
        });
        $('div').on('click', '.select-option', function(){
            $("input[name='update-bank']").val($(this)[0].textContent);
            $("input[name='update-bank-id']").val($(this).attr('bank-id'));
            $("input[name='update-bank-code']").val($(this).attr('bank-code'));
        });
        $('.navbar-body').on('click', '.add-bank-btn', function(){
            $('#add-options').html($('#bank-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.edit-bank-btn', function(){
            $('#edit-options').html($('#bank-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.update-bank-btn', function(){
            $('#update-options').html($('#bank-select').html());
            initRipple();
        });
        initButtonPrevention();
    });
    var initButtonPrevention = function(){
        jQuery.fn.preventDoubleSubmission = function(){
            if($(this)[0].checkValidity()){
                $(this).on('submit',function(e){
                    var $form = $(this);
                    if ($form.data('submitted') === true){
                        e.preventDefault();
                    }else{
                        $form.data('submitted', true);
                    }
                });
                return this;
            }
        };	
        $('form').preventDoubleSubmission();
    }
</script>