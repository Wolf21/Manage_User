<?php

namespace App\Http\Service;


use App\Models\User;

class UserService
{
    public function addUser() {
        $data = [
            'user_id' => request()->user_id,
            'user_name' => request()->user_name,
            'email' => request()->email,
            'role' => request()->role,
            'password' => encrypt(request()->password)
        ];
        User::insert($data);
    }

    public function listUser() {
        return $user = User::all();
    }

    public function findUserByUserId() {
        return User::where('user_id' ,request()->user_id)->first();
    }

    public function editUser() {
        $data = [
            'user_name' => request()->user_name,
            'email' => request()->email,
            'role' => request()->role
        ];
        User::where('user_id', request()->user_id)->update($data);
    }

    public function deleteUser() {
        User::where('user_id', request()->user_id)->delete();
    }

}