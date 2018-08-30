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
/******/ 	return __webpack_require__(__webpack_require__.s = 50);
/******/ })
/************************************************************************/
/******/ ({

/***/ 50:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(51);


/***/ }),

/***/ 51:
/***/ (function(module, exports) {

var deleteUserModal = $('#delete-user-modal');

$('.delete-btn').on('click', function () {
    var trElement = $(this).closest('tr');
    var user_id = trElement.data("user_id");

    $.ajax({
        type: "POST",
        url: "/delete-confirm",
        data: {
            _token: window.Laravel.csrfToken,
            'user_id': user_id
        },
        success: function success(response) {
            $('#delete-user-modal form ').html('');
            $('#delete-user-modal form').html(response);
        }
    });
});

$('#delete-user-modal .save-btn').on('click', function () {
    var user_id = deleteUserModal.find(".delete-confirm-message").data('user_id');

    var data = {
        '_token': window.Laravel.csrfToken,
        'user_id': user_id
    };

    $.ajax({
        type: "POST",
        url: "/delete-complete",
        data: data,
        success: function success(response) {
            $('tbody').html('');
            $('tbody').html(response);
            var modalElement = $('#delete-user-modal');
            modalElement.modal('hide');
            modalElement.removeClass('fade');

            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        },
        error: function error(data) {
            console.log(data);
            var err = data.responseJSON;
            if (err) {
                $.each(err.errors, function (key, value) {
                    deleteUserModal.find('#err-message ul').append('<li class="text-danger">' + value + '</li>');
                });
            }
        }
    });
});

/***/ })

/******/ });