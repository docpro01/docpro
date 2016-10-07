<script>
    var all_users = [];
    $.get(window.location.origin+'/docpro_settings/users/get_all_users', function(response){
        $.each(JSON.parse(response), function(index, data){
            all_users.push(data.u_name);
        });
    });
</script>
<script>
    var no_space = function(){
        $(".no-space").on({
          keydown: function(e) {
            if (e.which === 32 && $(this).val().length === 0)
              return false;
          },
        });
    }

    var check_username = function(u_name){
        $('.add-username').keyup(function(){
            if(all_users.indexOf($(this).val()) !== -1){
                $(this).css('border', '1px solid red');
                $('#add-username-notif').css('display', 'block');
                $('#add-submit').attr('disabled', true);
            }else{
                $(this).css('border', '1px solid #ccc');
                $('#add-username-notif').css('display', 'none');
                $('#add-submit').removeAttr('disabled');
            }
        });
        $('.edit-username').keyup(function(){
            if(u_name !== $(this).val()){
                if(all_users.indexOf($(this).val()) !== -1){
                    $(this).css('border', '1px solid red');
                    $('#edit-username-notif').css('display', 'block');
                    $('#edit-submit').attr('disabled', true);
                }else{
                    $(this).css('border', '1px solid #ccc');
                    $('#edit-username-notif').css('display', 'none');
                    $('#edit-submit').removeAttr('disabled');
                }
            }else{
                $(this).css('border', '1px solid #ccc');
                $('#edit-username-notif').css('display', 'none');
                $('#edit-submit').removeAttr('disabled');
            }
        });
    }
    var does_password_match = function(){
        $('.add-password1').keyup(function(){
            if($(this).val() === $('.add-password2').val()){
                $('#add-submit').removeAttr('disabled');
                $('#add-password-match').css('display', 'none');
                $(this).css('border', '1px solid #ccc');
                $('.add-password2').css('border', '1px solid #ccc');
            }else{
                $('#add-submit').attr('disabled', true);
                $('#add-password-match').css('display', 'block');
                $(this).css('border', '1px solid red');
                $('.add-password2').css('border', '1px solid red');
            }
        });
        $('.add-password2').keyup(function(){
            if($(this).val() === $('.add-password1').val()){
                $('#add-submit').removeAttr('disabled');
                $('#add-password-match').css('display', 'none');
                $(this).css('border', '1px solid #ccc');
                $('.add-password1').css('border', '1px solid #ccc');
            }else{
                $('#add-submit').attr('disabled', true);
                $('#add-password-match').css('display', 'block');
                $(this).css('border', '1px solid red');
                $('.add-password1').css('border', '1px solid red');
            }
        });
        $('.edit-password1').keyup(function(){
            if($(this).val() === $('.edit-password2').val()){
                $('#edit-submit').removeAttr('disabled');
                $('#edit-password-match').css('display', 'none');
                $(this).css('border', '1px solid #ccc');
                $('.edit-password2').css('border', '1px solid #ccc');
            }else{
                $('#edit-submit').attr('disabled', true);
                $('#edit-password-match').css('display', 'block');
                $(this).css('border', '1px solid red');
                $('.edit-password2').css('border', '1px solid red');
            }
        });
        $('.edit-password2').keyup(function(){
            if($(this).val() === $('.edit-password1').val()){
                $('#edit-submit').removeAttr('disabled');
                $('#edit-password-match').css('display', 'none');
                $(this).css('border', '1px solid #ccc');
                $('.edit-password1').css('border', '1px solid #ccc');
            }else{
                $('#edit-submit').attr('disabled', true);
                $('#edit-password-match').css('display', 'block');
                $(this).css('border', '1px solid red');
                $('.edit-password1').css('border', '1px solid red');
            }
        });
    }
    $(document).ready(function(){
        var table = $('#users-table').DataTable({
            ajax: window.location.origin+'/docpro_settings/users/get',
            columns: [
                        {
                            mData: null, bSortable: false,
                            mRender: function(data, type, full){
                                if(full.u_flag === '0'){
                                    return "<button type='button' class='btn btn-primary btn-xs btn-raised title view' custom-title='View' disabled><i class='fa fa-eye'></i></button>\n\
                                       <button type='button' class='btn btn-success btn-xs btn-raised title edit' custom-title='Edit' disabled><i class='fa fa-pencil'></i></button>";
                                }
                                return "<button type='button' class='btn btn-primary btn-xs btn-raised title view' custom-title='View'><i class='fa fa-eye'></i></button>\n\
                                       <button type='button' class='btn btn-success btn-xs btn-raised title edit' custom-title='Edit'><i class='fa fa-pencil'></i></button>";
                            }
                        },
                        {'data': 'u_seq'},
                        {
                            mRender: function(data, type, full){
                               return full.p_fname+" "+full.p_mname+" "+full.p_lname;
                            }
                        },
                        {'data': 'p_address'}, {'data': 'p_cno'}, {'data': 'p_email'}, {'data': 'u_name'}, {'data': 'u_type'}
                    ],
                    createdRow: function( row, data, dataIndex ) {
                        if(data.u_flag === '0'){
                            $(row).css('color', '#a5a5a5');
                            $(row).addClass('disabled');
                        }
                    },
                    columnDefs: [{targets: 0, width: '70px'}],
                    order: [['1', 'asc']],
                    scrollX: true,
                    initComplete: function(settings, json){
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
            no_space();
            initNumberValidation();
            required_readonly();
            does_password_match();
            check_username('');
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
                placement: function(context, src){
                    $(context).addClass('view-modal-body');
                    return 'right';
                },
                content: function(){
                    return $('#view-popover').html();
                },
                callback: function(){
                    $('#view-seq').val(data.u_seq);
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
            no_space();
            initNumberValidation();
            required_readonly();
            does_password_match();
            check_username();
        });
        $('#users-table').on('click', '.edit', function(){
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
                    $('#edit-seq').val(data.u_seq);
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
                    $('#cb-id').val(data.cb_id);
                    $('#edit-cb-id').val(data.cb_id);
                    $('#edit-id').val(data.u_id);
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
            required_readonly();
            does_password_match();
            check_username(data.u_name);
            initSingleSubmit();
        });
        $('div').on('click', '.close-popover', function(){
            $('.popover').popover('hide');
            $('.card-body button').removeAttr('disabled');
            $('tr.disabled button').attr('disabled', true);
        });
        $('div').on('click', '#close-btn', function(){
            $('.popover').popover('hide');
            $('.card-body button').removeAttr('disabled');
            $('tr.disabled button').attr('disabled', true);
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