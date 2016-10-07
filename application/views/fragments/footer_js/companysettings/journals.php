<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/company_settings/journals_seq.js"></script>
<script>
    $(document).ready(function(){
        var table_summary = $('#journals-summary-table').DataTable({
            ajax: window.location.origin+'/company_settings/journals/get',
            columns:[
                        {'data': 'j_code'}, {'data': 'j_name'}, {'data': 'j_shortname'}
                    ],
            columnDefs: [{targets: 0, width: '100px'}, {targets: 1, width: '70px'}],
            order: [['1', 'asc']],
            scrollX: true,
            initComplete: function(){
                initRipple();
            }

        });
        var table = $('#journals-table').DataTable({
            ajax: window.location.origin+'/company_settings/journals/get',
            columns:[
                        {
                            mData: null, bSortable: false,
                            mRender: function(data, type, full){
                                if(parseFloat(data.j_id) < 9){
                                    return "<button type='button' class='btn btn-primary btn-xs btn-raised view title' custom-title='View' style='width: 100%;'><i class='fa fa-eye'></i></button>";
                                }
                                return "<button type='button' class='btn btn-primary btn-xs btn-raised view title' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                        <button type='button' class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>\n\
                                        <button type='button' class='btn btn-warning btn-xs btn-raised update title' custom-title='Update'><i class='fa fa-refresh'></i></button>";
                            }
                        },
                        {'data': 'j_code'}, {'data': 'j_name'}, {'data': 'j_shortname'}
                    ],
            columnDefs: [{targets: 0, width: '100px'}, {targets: 1, width: '70px'}],
            order: [['1', 'asc']],
            scrollX: true,
            initComplete: function(){
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
        $('#journals-table').on('click', '.view', function(){
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
                    $('#view-code').val(data.j_code);
                    $('#view-name').val(data.j_name);
                    $('#view-shortname').val(data.j_shortname);
                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
        });
        $('#journals-table').on('click', '.edit', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            $(this).popover({
                animation: true,
                html: true,
                placement: 'right',
                content: function(){
                    return $('#edit-popover').html();
                },
                callback: function(){
                    $('#edit-name').val(data.j_name);
                    $('#edit-shortname').val(data.j_shortname);
                    $('#edit-id').val(data.j_id);
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
        $('#journals-table').on('click', '.update', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            $(this).popover({
                animation: true,
                html: true,
                placement: 'right',
                content: function(){
                    return $('#update-popover').html();
                },
                callback: function(){
                    $('#update-name').val(data.j_name);
                    $('#update-shortname').val(data.j_shortname);
                    $('#co-j-id').val(data.co_j_id);
                    $('#update-id').val(data.j_id);
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