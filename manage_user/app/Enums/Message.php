<?php
/**
 * Created by PhpStorm.
 * User: cuongnq
 * Date: 27/08/2018
 * Time: 14:42
 */

namespace App\Enums;


use MyCLabs\Enum\Enum;

class Message extends Enum
{
    const IN_VALID_LOGIN = 'Invalid Email or Password';
    const REGISTER_SUCCESS = 'Register success, Please Login to continue !';
    const ADD_USER_SUCCESS = 'Add User Success !';
    const EDIT_USER_SUCCESS = 'Edit User Success !';
    const DELETE_USER_SUCCESS = 'Delete User Success !';
}