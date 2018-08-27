<?php
/**
 * Created by PhpStorm.
 * User: cuongnq
 * Date: 24/08/2018
 * Time: 11:14
 */

namespace App\Http\Service;


use App\Models\User;

class UserService
{
    private function addUser() {

    }

    public function listUser(){
        $user = User::all();
        return $user;
    }

}