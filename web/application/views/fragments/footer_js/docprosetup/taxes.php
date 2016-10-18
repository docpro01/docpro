<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/docpro_setup/tax_setup_seq.js"></script>

<script>
    $(document).ready(function(){
        var tt_id = parseFloat($("input[name=default_tt_id]").val());
        var tt_name = $("input[name=default_tt_name]").val().length > 0 ? $("input[name=default_tt_name]").val() : '';
        var tt_code = '';
        var no_space = function(){
            $(".no-space").on({
              keydown: function(e) {
                if (e.which === 32 && $(this).val().length === 0)
                  return false;
              },
            });
        }

        var tt_table = $('#tax-types-table').DataTable({
            ajax: window.location.origin+'/docpro_setup/taxtypes/get',
            columns:[
                        {
                            mData: null, bSortable: false,
                            mRender: function(data, type, full){
                                return "<button type='button' class='btn btn-primary btn-xs btn-raised view title' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                        <button type='button' class='btn btn-success btn-xs btn-raised edit title' custom-title='Edit'><i class='fa fa-pencil'></i></button>\n\
                                        <button type='button' class='btn btn-danger btn-xs btn-raised title delete' custom-title='Delete'><i class='fa fa-times'></i></button>";
                            }
                        },
                        {'data': 'tt_seq'}, 
                        {'data': 'tt_code'}, 
                        {'data': 'tt_name'}, 
                        {'data': 'tt_shortname'}
                    ],
                    columnDefs: [{targets: 0, width: '100px'}, {targets: [1,2], width: '80px'}, {targets: 4, width: '120px'}],
                    order: [['2', 'asc']],
                    scrollX: true,
                    bLengthChange: false,
                    fnDrawCallback: function(oSettings) {
                        $.each(oSettings.aoData, function(index, data){
                            if(data._aData.tt_id+'' === tt_id+''){
                                $('#tax-types-table tbody tr:eq('+index+')').addClass('selected');
                            }
                        });
                    },
                    initComplete: function(json, src){
                        initRipple();
                        init_tooltip();
                    }
        });

        var table = $('#taxes-table').DataTable({
            ajax: window.location.origin+'/docpro_settings/taxes/get/'+tt_id,
            columns:[
                        {
                            mData: null, bSortable: false,
                            mRender: function(data, type, full){
                                return "<button type='button' class='btn btn-primary btn-xs btn-raised title view' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                        <button type='button' class='btn btn-success btn-xs btn-raised title edit' custom-title='Edit'><i class='fa fa-pencil'></i></button>\n\
                                        <button type='button' class='btn btn-danger btn-xs btn-raised title delete' custom-title='Delete'><i class='fa fa-times'></i></button>";
                            }
                        },
                        {'data': 't_seq'},{'data': 't_code'}, {'data': 'tt_name'}, {'data': 't_name'}, {'data': 't_shortname'}, {'data': 't_rate'}, {'data': 't_base'}
                    ],
                    columnDefs: [{targets: 0, width: '100px'}, {targets: [1,2], width: '40px'}],
                    order: [['1', 'asc']],
                    scrollX: true,
                    bLengthChange: false,
                    initComplete: function(json, src){
                        initRipple();
                    },
        });
        
        var tmp = $.fn.popover.Constructor.prototype.show;
        $.fn.popover.Constructor.prototype.show = function () {
              tmp.call(this);
              if (this.options.callback) {
                this.options.callback();
              }
        }

        var init_breadcrumb = function(){
            $('#tax_breadcrumb').html(
                                    "<li><a href='#'>"+((tt_name === '') ? '...' : tt_name)+"</a></li>"+
                                    "<li><a href='#'>...</a></li>"
                                );
            if(parseFloat(tt_id) > 0){
                $('#add').removeAttr('disabled');
                $('#tax-alert').css('display', 'none');
            }else{
               $('#add').attr('disabled', true);
               $('#tax-alert').css('display', 'block');
            }
        }
        init_breadcrumb();
        

        $('#tax-types-table').on('click', 'tr', function(){
            $('#tax-types-table tr').removeClass('selected');
            $(this).addClass('selected');
            var data = tt_table.row($(this)).data();
            tt_id = data.tt_id;
            tt_name = data.tt_name;
            init_breadcrumb();
            table.ajax.url(window.location.origin+'/docpro_settings/taxes/get/'+tt_id).load();
        });

        $('#add-tt').click(function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = tt_table.row(this.closest('tr')).data();
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context, src){
                    $(context).addClass('tt-add-modal-body');
                    return 'right';
                },
                content: function(){
                    return $('#tt-add-popover').html();
                },
                callback: function(){

                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
            no_space();
            initNumberValidation();
            initSingleSubmit();
        });
        $('#tax-types-table').on('click', '.view', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = tt_table.row(this.closest('tr')).data();
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context, src){
                    $(context).addClass('tt-view-modal-body');
                    return 'right';
                },
                content: function(){
                    return $('#tt-view-popover').html();
                },
                callback: function(){
                    $('#tt-view-code').val(data.tt_code);
                    $('#tt-view-name').val(data.tt_name);
                    $('#tt-view-shortname').val(data.tt_shortname);
                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
            no_space();
            initNumberValidation();
        });
        $('#tax-types-table').on('click', '.edit', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = tt_table.row(this.closest('tr')).data();
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context, src){
                    $(context).addClass('tt-edit-modal-body');
                    return 'right';
                },
                content: function(){
                    return $('#tt-edit-popover').html();
                },
                callback: function(){
                    $('#tt-edit-code').val(data.tt_code);
                    $('#tt-edit-name').val(data.tt_name);
                    $('#tt-edit-shortname').val(data.tt_shortname);
                    $('#tt-edit-id').val(data.tt_id);
                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
               
            });
            $(this).popover('toggle');
            initRipple();
            no_space();
            initNumberValidation();
            initSingleSubmit();
        });
        $('#tax-types-table').on('click', '.update', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = tt_table.row(this.closest('tr')).data();
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context, src){
                    $(context).addClass('tt-update-modal-body');
                    return 'right';
                },
                content: function(){
                    return $('#tt-update-popover').html();
                },
                callback: function(){
                    $('#tt-update-code').val(data.tt_code);
                    $('#tt-update-name').val(data.tt_name);
                    $('#tt-update-shortname').val(data.tt_shortname);
                    $('#tt-update-id').val(data.tt_id);
                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
            no_space();
            initNumberValidation();
            initSingleSubmit();
        });
        $('#tax-types-table').on('click', '.delete', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = tt_table.row(this.closest('tr')).data();
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context, src){
                    $(context).addClass('tt-delete-modal-body');
                    return 'right';
                },
                content: function(){
                    return $('#tt-delete-popover').html();
                },
                callback: function(){
                    $('#tt-delete-code').val(data.tt_code);
                    $('#tt-delete-name').val(data.tt_name);
                    $('#tt-delete-shortname').val(data.tt_shortname);
                    $('#tt-delete-id').val(data.tt_id);
                },
                container: '.navbar-body'
            }).on('show.bs.popover', function(){
                $('.popover').not(this).popover('hide');
                $('.card-body button').attr('disabled', true);
            });
            $(this).popover('toggle');
            initRipple();
            no_space();
            initNumberValidation();
            initSingleSubmit();
        });

// TAX
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
                callback: function(){
                    $('#add-type-select').selectize({
                        create: false,
                        sortField: {
                            field: 'text',
                            direction: 'asc'
                        },
                        dropdownParent: null,
                        onChange: function(){
                            var selectize = $('#add-type-select.selectized').selectize()[0].selectize
                            var code = selectize.options[tt_id].code;
                            $('#add-type-code').val(code);
                        },
                    });
                    var selectize = $('#add-type-select.selectized').selectize()[0].selectize;
                    selectize.clear();
                    selectize.clearOptions();
                    $.get(window.location.origin+'/docpro_settings/taxes/get_tax_types', function(response){
                        var data = JSON.parse(response);
                        var selectOptions = [];
                        $.each(data, function(index, data){
                            selectOptions.push({
                                text: data.tt_name,
                                value: data.tt_id,
                                code: data.tt_code
                            });
                        });

                        selectize.clear();
                        selectize.clearOptions();
                        selectize.renderCache = {};
                        selectize.load(function(callback) {
                            callback(selectOptions);
                        });
                        selectize.setValue(tt_id);
                    });
                    $('#add-type-id').val(tt_id);
                    $('#add-type-code').val(tt_code);
                    $('#add-type-name').val(tt_name);
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
            initValidation();
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
                placement: function(context, src){
                    $(context).addClass('view-modal-body');
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
                container: '.navbar-body'
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
                    $('#edit-type-select').selectize({
                        create: false,
                        sortField: {
                            field: 'text',
                            direction: 'asc'
                        },
                        dropdownParent: null,
                        onChange: function(){
                            var selectize = $('#edit-type-select.selectized').selectize()[0].selectize
                            var code = selectize.options[tt_id].code;
                            $('#edit-type-code').val(code);
                        },
                    });
                    var selectize = $('#edit-type-select.selectized').selectize()[0].selectize;
                    selectize.clear();
                    selectize.clearOptions();
                    $.get(window.location.origin+'/docpro_settings/taxes/get_tax_types', function(response){
                        var data = JSON.parse(response);
                        var selectOptions = [];
                        $.each(data, function(index, data){
                            selectOptions.push({
                                text: data.tt_name,
                                value: data.tt_id,
                                code: data.tt_code
                            });
                        });

                        selectize.clear();
                        selectize.clearOptions();
                        selectize.renderCache = {};
                        selectize.load(function(callback) {
                            callback(selectOptions);
                        });
                        selectize.setValue(tt_id);
                    });
                    $('#edit-type-id').val(tt_id);
                    $('#edit-type-code').val(tt_code);
                    $('#edit-type-name').val(tt_name);

                    $('#edit-code').val(data.t_code);
                    $('#edit-name').val(data.t_name);
                    $('#edit-shortname').val(data.t_shortname);
                    $('#edit-rate').val(data.t_rate);
                    $('#edit-base').val(data.t_base);
                    $('#edit-type-id').val(data.tt_id);
                    $('#edit-type-code').val(data.tt_code);
                    $('#edit-id').val(data.t_id);
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
            initValidation();
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
                    $('#update-type-select').selectize({
                        create: false,
                        sortField: {
                            field: 'text',
                            direction: 'asc'
                        },
                        dropdownParent: null,
                        onChange: function(){
                            var selectize = $('#update-type-select.selectized').selectize()[0].selectize
                            var code = selectize.options[tt_id].code;
                            $('#update-type-code').val(code);
                        },
                    });
                    var selectize = $('#update-type-select.selectized').selectize()[0].selectize;
                    selectize.clear();
                    selectize.clearOptions();
                    $.get(window.location.origin+'/docpro_settings/taxes/get_tax_types', function(response){
                        var data = JSON.parse(response);
                        var selectOptions = [];
                        $.each(data, function(index, data){
                            selectOptions.push({
                                text: data.tt_name,
                                value: data.tt_id,
                                code: data.tt_code
                            });
                        });

                        selectize.clear();
                        selectize.clearOptions();
                        selectize.renderCache = {};
                        selectize.load(function(callback) {
                            callback(selectOptions);
                        });
                        selectize.setValue(tt_id);
                    });
                    $('#update-type-id').val(tt_id);
                    $('#update-type-code').val(tt_code);
                    $('#update-type-name').val(tt_name);

                    $('#update-code').val(data.t_code);
                    $('#update-name').val(data.t_name);
                    $('#update-shortname').val(data.t_shortname);
                    $('#update-rate').val(data.t_rate);
                    $('#update-base').val(data.t_base);
                    $('#update-type-id').val(data.tt_id);
                    $('#update-type-code').val(data.tt_code);
                    $('#update-id').val(data.t_id);
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
            initValidation();
            initSingleSubmit();
        });
        $('#taxes-table').on('click', '.delete', function(){
            $('body').on('hidden.bs.popover', function (e) {
                $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
            });
            var data = table.row(this.closest('tr')).data();
            let seq = $(this.closest('tr')).find('td:eq(1)').text();
            $(this).popover({
                animation: true,
                html: true,
                placement: function(context, src){
                    $(context).addClass('delete-modal-body');
                    return 'right';
                },
                content: function(){
                    return $('#delete-popover').html();
                },
                callback: function(){
                    $('#delete-code').val(data.t_code);
                    $('#delete-type').val(data.tt_name);
                    $('#delete-name').val(data.t_name);
                    $('#delete-shortname').val(data.t_shortname);
                    $('#delete-rate').val(data.t_rate);
                    $('#delete-base').val(data.t_base);
                    $('#delete-type-id').val(data.tt_id);
                    $('#delete-type-code').val(data.tt_code);
                    $('#delete-id').val(data.t_id);
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
            initValidation();
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

<script>
    $(document).ready(function(){
        var tmp = $.fn.popover.Constructor.prototype.show;
            $.fn.popover.Constructor.prototype.show = function () {
              tmp.call(this);
              if (this.options.callback) {
                this.options.callback();
              }
        }
        
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

        // $('#switch-state').bootstrapSwitch();
        // init_table_option(table, $(this).closest('side-body'));
    });
</script>