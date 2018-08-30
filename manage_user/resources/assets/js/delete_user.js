var deleteUserModal = $('#delete-user-modal');

$(document).on('click', '.delete-btn',function () {
    var rootEl = $(this).closest('tr');

    var user_id = rootEl.data("user_id");
    $.ajax({
        type: "POST",
        url: "/delete-confirm",
        data: {
            _token:window.Laravel.csrfToken,
            'user_id': user_id
        },
        success: function (response) {
            $('#delete-user-modal form').html(response);
        }
    })
});

$(document).on('click', '#delete-user-modal .save-btn' ,function () {
    var user_id = deleteUserModal.find(".delete-confirm-message").data('user_id');

    var data = {
        '_token': window.Laravel.csrfToken,
        'user_id': user_id
    };

    $.ajax({
        type: "POST",
        url: "/delete-complete",
        data: data,
        success: function (response) {
            $('tbody').html('');
            $('tbody').html(response.html);
            var modalElement = $('#delete-user-modal');
            modalElement.modal('hide');

            $('#message').text(response.message).show().addClass('alert-success');
            setTimeout(() => {
                $('#message').hide().removeClass('alert-success');
            }, 5000);
        },
        error: function (data) {
            var err = data.responseJSON;
            if(err){
                $.each(err.errors, function (key,value) {
                    deleteUserModal.find('#err-message ul').append('<li class="text-danger">' +value+ '</li>');
                })
            }
        }
    })
});