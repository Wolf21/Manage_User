/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 48);
/******/ })
/************************************************************************/
/******/ ({

/***/ 48:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(49);


/***/ }),

/***/ 49:
/***/ (function(module, exports) {

var editUserModal = $('#edit-user-modal');

$('.edit-btn').on('click', function () {
    var trElement = $(this).closest('tr');
    var user_id = trElement.data("user_id");

    $.ajax({
        type: "POST",
        url: "/edit",
        data: {
            _token: window.Laravel.csrfToken,
            'user_id': user_id
        },
        success: function success(response) {
            $('#edit-user-modal form').html('');
            $('#edit-user-modal form').html(response);
        }
    });
});

$('#edit-user-modal .save-btn').on('click', function () {
    $('#err-message ul li').remove();
    var email = editUserModal.find("input[name='email']").val(),
        user_id = editUserModal.find("input[name='user_id']").val(),
        user_name = editUserModal.find("input[name='user_name']").val(),
        role = editUserModal.find("option:selected").val();

    var data = {
        '_token': window.Laravel.csrfToken,
        'email': email,
        'user_id': user_id,
        'user_name': user_name,
        'role': role
    };

    $.ajax({
        type: "POST",
        url: "/edit-complete",
        data: data,
        success: function success(response) {
            $('tbody').html('');
            $('tbody').html(response.html);
            var modalElement = $('#edit-user-modal');
            modalElement.modal('hide');
            modalElement.removeClass('fade');

            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();

            $('#message').text(response.message).show().addClass('alert-success');

            setTimeout(function () {
                $('#message').hide().removeClass('alert-success');
            }, 5000);
        },
        error: function error(data) {
            var err = data.responseJSON;
            if (err) {
                $.each(err.errors, function (key, value) {
                    editUserModal.find('#err-message ul').append('<li class="text-danger">' + value + '</li>');
                });
            }
        }
    });
});

/***/ })

/******/ });