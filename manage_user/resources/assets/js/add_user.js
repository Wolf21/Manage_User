var addUserModal = $('#add-user-modal');

$('#add-user-modal .save-btn').on('click',function () {
    $('#err-message ul li').remove();
    var email = addUserModal.find("input[name='email']").val(),
        user_id = addUserModal.find("input[name='user_id']").val(),
        user_name = addUserModal.find("input[name='user_name']").val(),
        role = addUserModal.find("option:selected").val(),
        password = addUserModal.find("input[name='password']").val(),
        confirm_password = addUserModal.find("input[name='confirm_password']").val();

    $.ajax({
        type: "POST",
        url: "/add",
        data: {
            '_token': window.Laravel.csrfToken,
            'email': email,
            'user_id': user_id,
            'user_name':user_name,
            'role': role,
            'password': password,
            'confirm_password': confirm_password
        },
        success: function (response) {
            $('tbody').html('');
            $('tbody').html(response);
            var modalElement = $('#add-user-modal');
            modalElement.modal('hide');
            modalElement.removeClass('fade');

            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        },
        error: function (data) {
            var err = data.responseJSON;
            if(err){
                $.each(err.errors, function (key,value) {
                    addUserModal.find('#err-message ul').append('<li class="text-danger">' +value+ '</li>');
                })
            }
        }
    })
});