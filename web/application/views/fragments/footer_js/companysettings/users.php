<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/company_settings/users_seq.js"></script> -->
<script>
    $(document).ready(function(){
        var seq = 0;
        // var table_summary = $('#users-summary-table').DataTable({
        //     ajax: window.location.origin+'/company_settings/users/get',
        //     columns: [
        //                 {
        //                     bSortable: false, bSearchable: false,
        //                     mRender: function(row, setting, full){
        //                         return "<button type='button' class='btn btn-default btn-xs btn-raised accounts title' custom-title='Accounts'>Accounts</button>";
        //                     }
        //                 },
        //                 {'data': 'p_fname'},
        //                 {'data': 'p_mname'},
        //                 {'data': 'p_lname'},
        //                 {'data': 'p_address'},
        //                 {'data': 'p_cno'},
        //                 {'data': 'p_email'},
        //     ],
        //     scrollX: true,
        //     columnDefs: [{targets: 0, width: '40px'}],
        //     order: [['1', 'asc']],
        //     initComplete: function(settings, json){
        //         seq = 0;
        //         initRipple();
        //     }
        // });
        var table = $('#users-table').DataTable({
            ajax: window.location.origin+'/company_settings/users/get',
            columns: [
                        {
                            mData: null, bSortable: false,
                            mRender: function(data, type, full){
                               return "<button type='button' class='btn btn-primary btn-xs btn-raised view title' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                       <button type='button' class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>";
                            }
                        },
                        {'data': 'p_fname'},
                        {'data': 'p_mname'},
                        {'data': 'p_lname'},
                        {'data': 'p_address'},
                        {'data': 'p_cno'},
                        {'data': 'p_email'},
            ],
            columnDefs: [{targets: 0, width: '70px'}],
            order: [['1', 'asc']],
            scrollX: true,
            initComplete: function(settings, json){
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
                placement: 'right',
                content: function(){
                    return $('#add-popover').html();
                },
                callback: function(){
                    $('#add-type').selectize();
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
        $('#users-table').on('click', '.view', function(){
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
                    $('#view-fname').val(data.p_fname);
                    $('#view-mname').val(data.p_mname);
                    $('#view-lname').val(data.p_lname);
                    $('#view-cno').val(data.p_cno);
                    $('#view-email').val(data.p_email);
                    $('#view-address').val(data.p_address);
                    $('#view-username').val(data.u_name);
                    $('#view-company').val(data.cb_name);
                    $('#view-user-type').val(data.u_type);
                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
        });
        $('#users-table').on('click', '.edit', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            var seq = $(this.closest('tr')).find('td:eq(1)').text();
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
                    $('#edit-fname').val(data.p_fname);
                    $('#edit-mname').val(data.p_mname);
                    $('#edit-lname').val(data.p_lname);
                    $('#edit-address').val(data.p_address);
                    $('#edit-cno').val(data.p_cno);
                    $('#edit-email').val(data.p_email);
                    $('#edit-uname').val(data.u_name);
                    $('#edit-company').val(data.cb_name);
                    $('#edit-user-type').val(data.u_type);
                    $('#p-id').val(data.p_id);
                    $('#edit-id').val(data.u_id);
                    $('#cb-id').val(data.cb_id);
                    $('#edit-cb-id').val(data.cb_id);
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
        $('div').on('click', '.select-option-company', function(){
            $("input[name='add-company']").val($(this)[0].textContent);
            $("input[name='add-cb-id']").val($(this).attr('cb-id'));
        });
        $('div').on('click', '.select-option-user-type', function(){
            $("input[name='add-user-type']").val($(this)[0].textContent);
        });
        $('div').on('click', '.select-option-company', function(){
            $("input[name='edit-company']").val($(this)[0].textContent);
            $("input[name='edit-cb-id']").val($(this).attr('cb-id'));
        });
        $('div').on('click', '.select-option-user-type', function(){
            $("input[name='edit-user-type']").val($(this)[0].textContent);
        });
        $('.navbar-body').on('click', '.add-company-btn', function(){
            $('#add-options').html($('#u-company-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.add-user-type-btn', function(){
            $('#add-options').html($('#u-user-type-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.edit-company-btn', function(){
            $('#edit-options').html($('#u-company-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.edit-user-type-btn', function(){
            $('#edit-options').html($('#u-user-type-select').html());
            initRipple();
        });
        $("input:not(input[name='add-company']), select").focus(function(){
            $('.popover').hide();
        });
        $("input:not(input[name='add-user-type']), select").focus(function(){
            $('.popover').hide();
        });
        $("input:not(input[name='edit-company']), select").focus(function(){
            $('.popover').hide();
        });
        $("input:not(input[name='edit-user-type']), select").focus(function(){
            $('.popover').hide();
        });
        $('.navbar-body').on('click', '.form-control', function(){
            $('#add-options').empty();
        });
        $('.navbar-body').on('click', '.form-control', function(){
            $('#edit-options').empty();
        });

        $('#switch-state').bootstrapSwitch();
        init_table_option(table, $(this).closest('side-body'));
    });
</script>