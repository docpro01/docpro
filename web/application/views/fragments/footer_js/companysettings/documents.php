<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/company_settings/documents_seq.js"></script> -->
<script>
    $(document).ready(function(){
        var seq = 0;
        var table_summary = $('#documents-summary-table').DataTable({
            ajax: window.location.origin+'/company_settings/documents/get',
            columns:[
                        {
                            mRender: function(data, type, full){
                                return seq += 1;
                            }
                        }, 
                        {'data': 'd_code'}, {'data': 'd_class'}, {'data': 'd_name'}, {'data': 'd_shortname'}, {'data': 'j_name'}
                    ],
            columnDefs: [{targets: 0, width: '100px'}, {targets: 1, width: '40px'}],
            scrollX: true,
            initComplete: function(json, src){
                initRipple();
            }
        });
        var table = $('#documents-table').DataTable({
            ajax: window.location.origin+'/company_settings/documents/get',
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
                        {'data': 'd_code'}, {'data': 'd_class'}, {'data': 'd_name'}, {'data': 'd_shortname'}, {'data': 'j_name'}
                    ],
            columnDefs: [{targets: 0, width: '100px'}, {targets: 1, width: '40px'}],
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
        $('#documents-table').on('click', '.view', function(){
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
                    $('#view-seq').val(data.d_id);
                    $('#view-code').val(data.d_code);
                    $('#view-class').val(data.d_class);
                    $('#view-name').val(data.d_name);
                    $('#view-shortname').val(data.d_shortname);
                    $('#view-journal').val(data.j_name);  
                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
        });
        $('#documents-table').on('click', '.edit', function(){
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
                    $('#edit-seq').val(data.d_id);
                    $('#edit-class').val(data.d_class);
                    $('#edit-name').val(data.d_name);
                    $('#edit-shortname').val(data.d_shortname);
                    $('#edit-journal').val(data.j_name);
                    $('#edit-id').val(data.d_id);
                    $('#edit-journal-id').val(data.j_id);
                    $('#edit-journal-code').val(data.j_code);
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
        $('#documents-table').on('click', '.update', function(){
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
                    $('#update-class').val(data.d_class);
                    $('#update-name').val(data.d_name);
                    $('#update-shortname').val(data.d_shortname);
                    $('#update-journal').val(data.j_name);
                    $('#update-journal-id').val(data.j_id);
                    $('#update-journal-code').val(data.j_code);
                    $('#update-id').val(data.d_id);
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
            $("input[name='add-journal']").val($(this)[0].textContent);
            $("input[name='add-journal-id']").val($(this).attr('j-id'));
            $("input[name='add-journal-code']").val($(this).attr('j-code'));
        });
        $('div').on('click', '.select-option', function(){
            $("input[name='edit-journal']").val($(this)[0].textContent);
            $("input[name='edit-journal-id']").val($(this).attr('j-id'));
            $("input[name='edit-journal-code']").val($(this).attr('j-code'));
        });
        $('div').on('click', '.select-option', function(){
            $("input[name='update-journal']").val($(this)[0].textContent);
            $("input[name='update-journal-id']").val($(this).attr('j-id'));
            $("input[name='update-journal-code']").val($(this).attr('j-code'));
        });
        $('.navbar-body').on('click', '.add-journal-btn', function(){
            $('#add-options').html($('#d-journal-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.edit-journal-btn', function(){
            $('#edit-options').html($('#d-journal-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.update-journal-btn', function(){
            $('#update-options').html($('#d-journal-select').html());
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
        $('#switch-state').bootstrapSwitch();
        init_table_option(table, $(this).closest('side-body'));
    });
</script>