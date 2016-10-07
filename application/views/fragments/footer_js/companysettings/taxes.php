<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/company_settings/taxes_seq.js"></script>
<script>
    $(document).ready(function(){
        var seq = 0;
        var table_summary = $('#taxes-summary-table').DataTable({
            ajax: window.location.origin+'/company_settings/taxes/get',
            columns:[
                {
                    mRender: function(data, type, full){
                        return seq += 1;
                    }
                }, 
                {'data': 't_code'}, {'data': 'tt_name'}, {'data': 't_name'}, {'data': 't_shortname'}, {'data': 't_rate'}, {'data': 't_base'},
            ],
            columnDefs: [{targets: 0, width: '100px'}],
            order: [['1', 'asc']],
            initComplete: function(json, src){
                seq = 0;
                initRipple();
            }
        });
        var table = $('#taxes-table').DataTable({
            ajax: window.location.origin+'/company_settings/taxes/get',
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
            {'data': 't_code'}, {'data': 'tt_name'}, {'data': 't_name'}, {'data': 't_shortname'}, {'data': 't_rate'}, {'data': 't_base'},
            ],
            columnDefs: [{targets: 0, width: '100px'}],
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
        $('#taxes-table').on('click', '.view', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            let seq = $(this.closest('tr')).find('td:eq(1)').text();
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context,src){
                    $(context).addClass('view-popover-css');
                    return 'right';
                },
                content: function(){
                    return $('#view-popover').html();
                },
                callback: function(){
                    $('#view-seq').val(seq);
                    $('#view-code').val(data.t_code);
                    $('#view-type').val(data.tt_name);
                    $('#view-name').val(data.t_name);
                    $('#view-shortname').val(data.t_shortname);
                    $('#view-rate').val(data.t_rate);
                    $('#view-base').val(data.t_base);
                },
                container:'.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
        });
        $('#taxes-table').on('click', '.edit', function(){
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
                    $('#edit-type').val(data.tt_name);
                    $('#edit-name').val(data.t_name);
                    $('#edit-shortname').val(data.t_shortname);
                    $('#edit-rate').val(data.t_rate);
                    $('#edit-base').val(data.t_base);
                    $('#edit-id').val(data.co_t_id);
                    $('#edit-tax-id').val(data.t_id);
                    $('#edit-tax-code').val(data.t_code);
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
        $('#taxes-table').on('click', '.update', function(){
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
                    $('#update-type').val(data.tt_name);
                    $('#update-name').val(data.t_name);
                    $('#update-shortname').val(data.t_shortname);
                    $('#update-rate').val(data.t_rate);
                    $('#update-base').val(data.t_base);
                    $('#update-tax-id').val(data.t_id);
                    $('#update-tax-code').val(data.t_code);
                    $('#update-id').val(data.co_t_id);
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
            $("input[name='add-tax-id']").val($(this).attr('tax-id'));
            $("input[name='add-tax-code']").val($(this).attr('tax-code'));
            $("input[name='add-name']").val($(this)[0].textContent);
            $("input[name='add-type']").val($(this).attr('tax-type'));
            $("input[name='add-shortname']").val($(this).attr('tax-shortname'));
            $("input[name='add-rate']").val($(this).attr('tax-rate'));
            $("input[name='add-base']").val($(this).attr('tax-base'));
        });
        $('div').on('click', '.select-option', function(){
            $("input[name='edit-tax-id']").val($(this).attr('tax-id'));
            $("input[name='edit-tax-code']").val($(this).attr('tax-code'));
            $("input[name='edit-name']").val($(this)[0].textContent);
            $("input[name='edit-type']").val($(this).attr('tax-type'));
            $("input[name='edit-shortname']").val($(this).attr('tax-shortname'));
            $("input[name='edit-rate']").val($(this).attr('tax-rate'));
            $("input[name='edit-base']").val($(this).attr('tax-base'));
        });
        $('div').on('click', '.select-option', function(){
            $("input[name='update-tax-id']").val($(this).attr('tax-id'));
            $("input[name='update-tax-code']").val($(this).attr('tax-code'));
            $("input[name='update-name']").val($(this)[0].textContent);
            $("input[name='update-type']").val($(this).attr('tax-type'));
            $("input[name='update-shortname']").val($(this).attr('tax-shortname'));
            $("input[name='update-rate']").val($(this).attr('tax-rate'));
            $("input[name='update-base']").val($(this).attr('tax-base'));
        });
        $('.navbar-body').on('click', '.add-type-btn', function(){
            $('#add-options').html($('#t-type-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.edit-type-btn', function(){
            $('#edit-options').html($('#t-type-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.update-type-btn', function(){
            $('#update-options').html($('#t-type-select').html());
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