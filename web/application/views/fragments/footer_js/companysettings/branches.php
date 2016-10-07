<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/company_settings/branch_seq.js"></script>
<script>
    $(document).ready(function(){
        var table_summary = $('#branches-summary-table').DataTable({
            ajax: window.location.origin+'/company_settings/branches/get',
             columns:[ 
                {'data': 'ch_cb_name'}, 
                {'data': 'ch_cb_address'}, 
                {'data': 'ch_cb_tin'},
                {'data': 'ch_cb_tax_type'},
                {'data': 'ch_cb_cno'},
                {'data': 'ch_cb_email'},
            ],
            scrollX: true,
            initComplete: function(settings, json){
                initRipple();
            }
        });
        var table = $('#branches-table').DataTable({
            ajax: window.location.origin+'/company_settings/branches/get',
            columns:[
                {
                    mData: null, bSortable: false,
                    mRender: function(data, type, full){
                        return "<button type='button' class='btn btn-primary btn-xs btn-raised view title' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                <button type='button' class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>\n\
                                <button type='button' class='btn btn-warning btn-xs btn-raised update title' custom-title='Update'><i class='fa fa-refresh'></i></button>";
                    }
                },   
                {'data': 'ch_cb_name'}, 
                {'data': 'ch_cb_address'}, 
                {'data': 'ch_cb_tin'},
                {'data': 'ch_cb_tax_type'},
                {'data': 'ch_cb_cno'},
                {'data': 'ch_cb_email'},
            ],
            columnDefs: [{targets: 0, width: '100px'}],
            scrollX: true,
            order: [['1', 'asc']],
            initComplete: function(settings, json){
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
        $('#branches-table').on('click', '.view', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            $(this).popover({
                animation: true,
                html: true,
                placement: 'right',
                content: function(){
                    return $('#view-popover').html();
                },
                callback: function(){
                    $('#view-seq').val(data.ch_cb_seq);
                    $('#view-name').val(data.ch_cb_name);
                    $('#view-address').val(data.ch_cb_address);
                    $('#view-tin').val(data.ch_cb_tin);
                    $('#view-tax-type').val(data.ch_cb_tax_type);
                    $('#view-cno').val(data.ch_cb_cno);
                    $('#view-email').val(data.ch_cb_email);
                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
        });
        $('#branches-table').on('click', '.edit', function(){
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
                    $('#edit-seq').val(data.ch_cb_seq);
                    $('#edit-name').val(data.ch_cb_name);
                    $('#edit-address').val(data.ch_cb_address);
                    $('#edit-tin').val(data.ch_cb_tin);
                    $('#edit-cno').val(data.ch_cb_cno);
                    $('#edit-email').val(data.ch_cb_email);
                    $('#edit-id').val(data.br_id);
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
        $('#branches-table').on('click', '.update', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
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
                    $('#update-seq').val(data.ch_cb_seq);
                    $('#update-name').val(data.ch_cb_name);
                    $('#update-address').val(data.ch_cb_address);
                    $('#update-tin').val(data.ch_cb_tin);
                    $('#update-cno').val(data.ch_cb_cno);
                    $('#update-email').val(data.ch_cb_email);
                    $('#update-id').val(data.br_id);
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
    });
</script>