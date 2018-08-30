var deleteUserModal = $('#delete-user-modal');

$('.delete-btn').on('click',function () {
    var trElement = $(this).closest('tr');
    var user_id = trElement.data("user_id");

    $.ajax({
        type: "POST",
        url: "/delete-confirm",
        data: {
            _token:window.Laravel.csrfToken,
            'user_id': user_id
        },
        success: function (response) {
            $('#delete-user-modal form ').html('');
            $('#delete-user-modal form').html(response);
        }
    })
});

$('#delete-user-modal .save-btn').on('click',function () {
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
            $('tbody').html(response);
            var modalElement = $('#delete-user-modal');
            modalElement.modal('hide');
            modalElement.removeClass('fade');

            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        },
        error: function (data) {
            console.log(data);
            var err = data.responseJSON;
            if(err){
                $.each(err.errors, function (key,value) {
                    deleteUserModal.find('#err-message ul').append('<li class="text-danger">' +value+ '</li>');
                })
            }
        }
    })
});