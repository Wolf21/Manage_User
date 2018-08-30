<?php
/**
 * Created by PhpStorm.
 * User: cuongnq
 * Date: 24/08/2018
 * Time: 11:12
 */

namespace App\Http\Controllers;


use App\Http\Requests\UserAdd;
use App\Http\Requests\UserEdit;
use App\Http\Service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private static $userService;
    public function __construct()
    {
//        $this->middleware('auth');
        self::$userService = new UserService();
    }

    //Get/User List
    public function index(){
        $users = self::$userService->listUser();
        return view('index')->with('users',$users);
    }

    //Post/User Add
    public function addUser(UserAdd $request) {
        self::$userService->addUser();
        $users = self::$userService->listUser();
        return view('list-user')->with('users',$users);
    }

    //Get/User Edit
    public function showEditForm(Request $request){
        $user = self::$userService->findUserByUserId();
        return view('edit')->with('user',$user);
    }

    //Post/User Edit
    public function editUser(UserEdit $request){
         self::$userService->editUser();
        $users = self::$userService->listUser();
        return view('list-user')->with('users',$users);
    }

    //Post/ DeleteConfirm
    public function deleteConfirm(){
        $user = self::$userService->findUserByUserId();
        return view('delete-confirm')->with('user',$user);
    }

    public function deleteUser(){
        self::$userService->deleteUser();
        $users = self::$userService->listUser();
        return view('list-user')->with('users',$users);
    }

}