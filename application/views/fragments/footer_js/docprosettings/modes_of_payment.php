<script>
    $(document).ready(function(){
        var table = $('#modes-of-payment-table').DataTable({
            ajax: window.location.origin+'/docpro_settings/modes_of_payment/get',
            columns:[{
                mData: null, bSortable: false,
                mRender: function(data, type, full){
                    return "<button type='button' class='btn btn-primary btn-xs btn-raised title view' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                        <button type='button' class='btn btn-success btn-xs btn-raised title edit' custom-title='Edit'><i class='fa fa-pencil'></i></button>\n\
                                        <button type='button' class='btn btn-warning btn-xs btn-raised title update' custom-title='Update'><i class='fa fa-refresh'></i></button>";
                }
            },
            {'data': 'mop_seq'}, {'data': 'mop_code'}, {'data': 'mop_name'}, {'data': 'mop_shortname'}, {'data': 'top_type'},],
            columnDefs: [{targets: 0, width: '100px'}, {targets: 1, width: '1px'}, {targets: 2, width: '150px'}, {targets: 4, width: '150px'}, {targets: 5, width: '150px'}],
            order: [['1', 'asc']],
            scrollX: true,
            initComplete: function(json, src){
                initRipple();
            }
        });

        var tmp = $.fn.popover.Constructor.prototype.show;
            $.fn.popover.Constructor.prototype.show = function () {
              tmp.call(this);
              if (this.options.callback) {
                this.options.callback();
              }
        }
        

        $('#modes-of-payment-table').on('click', '.view', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            let seq = $(this.closest('tr')).find('td:eq(1)').text();
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context, src){
                    $(context).addClass('mop-view-modal-body');
                    return 'right';
                },
                content: function(){
                    return $('#mop-view-popover').html();
                },
                callback: function(){
                    $('#mop-view-seq').val(seq);
                    $('#mop-view-code').val(data.mop_code);
                    $('#mop-view-name').val(data.mop_name);
                    $('#mop-view-shortname').val(data.mop_shortname);
                    $('#mop-view-type').val(data.top_type);
                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
            no_space();
            required_readonly();
        });
        $('#add-mop').click(function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context, src){
                    $(context).addClass('mop-add-modal-body');
                    return 'right';
                },
                content: function(){
                    return $('#mop-add-popover').html();
                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
            no_space();
            required_readonly();
            initSingleSubmit();
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
                    $(context).addClass('mop-edit-modal-body')
                    return 'right';
                },
                content: function(){
                    return $('#mop-edit-popover').html();
                },
                callback: function(){
                    $('#mop-edit-seq').val(seq);
                    $('#mop-edit-code').val(data.mop_code);
                    $('#mop-edit-name').val(data.mop_name);
                    $('#mop-edit-shortname').val(data.mop_shortname);
                    $('#mop-edit-type').val(data.top_type);
                    $('#mop-edit-id').val(data.mop_id);
                    $('#mop-edit-type-id').val(data.top_id);
                    $('#mop-edit-type-code').val(data.top_code);
                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
            no_space();
            required_readonly();
            initSingleSubmit();
        });
        $('#modes-of-payment-table').on('click', '.update', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            let seq = $(this.closest('tr')).find('td:eq(1)').text();
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context, src){
                    $(context).addClass('mop-update-modal-body');
                    return 'right';
                },
                content: function(){
                    return $('#mop-update-popover').html();
                },
                callback: function(){
                    $('#mop-update-seq').val(seq);
                    $('#mop-update-code').val(data.mop_code);
                    $('#mop-update-name').val(data.mop_name);
                    $('#mop-update-shortname').val(data.mop_shortname);
                    $('#mop-update-type').val(data.top_type);
                    $('#mop-update-type-id').val(data.top_id);
                    $('#mop-update-type-code').val(data.top_code);
                    $('#mop-update-id').val(data.mop_id);
                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
            no_space();
            required_readonly();
            initSingleSubmit();
        });
        $('div').on('click', '.close-popover', function(){
            $('.popover').popover('hide');
            $('.card-body button').removeAttr('disabled');
        });
        $('div').on('click', '.select-option', function(){
            $("input[name='mop-add-type']").val($(this)[0].textContent);
            $("input[name='mop-add-type-id']").val($(this).attr('type-id'));
            $("input[name='mop-add-type-code']").val($(this).attr('type-code'));
        });
        $('div').on('click', '.select-option', function(){
            $("input[name='mop-edit-type']").val($(this)[0].textContent);
            $("input[name='mop-edit-type-id']").val($(this).attr('type-id'));
            $("input[name='mop-edit-type-code']").val($(this).attr('type-code'));
        });
        $('div').on('click', '.select-option', function(){
            $("input[name='mop-update-type']").val($(this)[0].textContent);
            $("input[name='mop-update-type-id']").val($(this).attr('type-id'));
            $("input[name='mop-update-type-code']").val($(this).attr('type-code'));
        });
        $('.navbar-body').on('click', '.add-type-btn', function(){
            $('#add-options').html($('#mop-type-select').html());
            initRipple();
        });
         $('.navbar-body').on('click', '.mop-add-type-btn', function(){
            $('#mop-add-options').html($('#mop-type-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.mop-edit-type-btn', function(){
            $('#mop-edit-options').html($('#mop-type-select').html());
            initRipple();
        });
        $('.navbar-body').on('click', '.mop-update-type-btn', function(){
            $('#mop-update-options').html($('#mop-type-select').html());
            initRipple();
        });

        $('#switch-state').bootstrapSwitch();
        init_table_option(table, $(this).closest('side-body'));
    });
</script>