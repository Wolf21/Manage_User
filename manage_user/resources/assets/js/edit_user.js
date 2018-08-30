var editUserModal = $('#edit-user-modal');

$('.edit-btn').on('click',function () {
    var trElement = $(this).closest('tr');
    var user_id = trElement.data("user_id");

    $.ajax({
        type: "POST",
        url: "/edit",
        data: {
            _token:window.Laravel.csrfToken,
            'user_id': user_id
        },
        success: function (response) {
            $('#edit-user-modal form').html('');
            $('#edit-user-modal form').html(response);
        }
    })
});

$('#edit-user-modal .save-btn').on('click',function () {
    $('#err-message ul li').remove();
    var email = editUserModal.find("input[name='email']").val(),
        user_id = editUserModal.find("input[name='user_id']").val(),
        user_name = editUserModal.find("input[name='user_name']").val(),
        role = editUserModal.find("option:selected").val();

    var data = {
        '_token': window.Laravel.csrfToken,
        'email': email,
        'user_id': user_id,
        'user_name':user_name,
        'role': role
    };

    $.ajax({
        type: "POST",
        url: "/edit-complete",
        data: data,
        success: function (response) {
            $('tbody').html('');
            $('tbody').html(response);
            var modalElement = $('#edit-user-modal');
            modalElement.modal('hide');
            modalElement.removeClass('fade');

            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        },
        error: function (data) {
            var err = data.responseJSON;
            if(err){
                $.each(err.errors, function (key,value) {
                    editUserModal.find('#err-message ul').append('<li class="text-danger">' +value+ '</li>');
                })
            }
        }
    })
});