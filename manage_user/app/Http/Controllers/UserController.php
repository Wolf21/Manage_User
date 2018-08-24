<?php
/**
 * Created by PhpStorm.
 * User: cuongnq
 * Date: 24/08/2018
 * Time: 11:12
 */

namespace App\Http\Controllers;


use App\Http\Service\UserService;

class UserController extends Controller
{
    public function __construct()
    {
        // middleware
    }

    public function addUser() {
//        $add  = (new UserService())->addUser();
//        return view('', ['add' => $add]);
    }

    public function listUser(){
        $user = new UserService();
        $user = $user->listUser();
        return view('index')->with('users',$user);
    }
}