<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/company_settings/discounts_seq.js"></script>
<script>
    $(document).ready(function(){
        var table_summary = $('#discounts-summary-table').DataTable({
            ajax: window.location.origin+'/company_settings/discounts/get',
            columns:[
                        {'data': 'co_d_code'}, {'data': 'co_d_name'}, {'data': 'co_d_shortname'}, {'data': 'co_d_rate'}
                    ],
            columnDefs: [{targets: 0, width: '100px'}, {targets: 1, width: '40px'}, {targets: 4, width: '40px'}],
            scrollX: true,
            initComplete: function(json, src){
                initRipple();
            }
        });

        var table = $('#discounts-table').DataTable({
            ajax: window.location.origin+'/company_settings/discounts/get',
            columns:[
                        {
                            mData: null, bSortable: false,
                            mRender: function(data, type, full){
                                return "<button type='button' class='btn btn-primary btn-xs btn-raised view title' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                        <button type='button' class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>\n\
                                        <button type='button' class='btn btn-warning btn-xs btn-raised update title' custom-title='Update'><i class='fa fa-refresh'></i></button>";
                            }
                        }, 
                        {'data': 'co_d_code'}, {'data': 'co_d_name'}, {'data': 'co_d_shortname'}, {'data': 'co_d_rate'}
                    ],
            columnDefs: [{targets: 0, width: '100px'}, {targets: 1, width: '40px'}, {targets: 4, width: '40px'}],
            scrollX: true,
            initComplete: function(json, src){
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
        $('#discounts-table').on('click', '.view', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
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
                    $('#view-code').val(data.co_d_code);
                    $('#view-name').val(data.co_d_name);
                    $('#view-shortname').val(data.co_d_shortname);
                    $('#view-rate').val(data.co_d_rate);
                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
        });
        $('#discounts-table').on('click', '.edit', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
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
                    $('#edit-id').val(data.co_d_id);
                    $('#edit-code').val(data.co_d_code);
                    $('#edit-name').val(data.co_d_name);
                    $('#edit-shortname').val(data.co_d_shortname);
                    $('#edit-rate').val(data.co_d_rate);
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
        $('#discounts-table').on('click', '.update', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
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
                    $('#update-code').val(data.co_d_code);
                    $('#update-name').val(data.co_d_name);
                    $('#update-shortname').val(data.co_d_shortname);
                    $('#update-rate').val(data.co_d_rate);
                    $('#update-id').val(data.co_d_id);
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
    });
</script>
