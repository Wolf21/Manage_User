<?php
/**
 * Created by PhpStorm.
 * User: cuongnq
 * Date: 24/08/2018
 * Time: 11:12
 */

namespace App\Http\Controllers;


use App\Enums\Message;
use App\Http\Requests\UserAdd;
use App\Http\Requests\UserEdit;
use App\Http\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private static $userService;
    public function __construct()
    {
//        $this->middleware('auth');
        self::$userService = new UserService();
    }

    /**
     * List User
     * @Method Get
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View (index)
     */
    public function index(){
        $users = self::$userService->listUser();
        return view('index')->with('users',$users);
    }


    /**
     * Add User
     * @Method Post
     * @param UserAdd $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View (list-user)
     * @throws \Throwable
     */

    public function addUser(UserAdd $request) {
        self::$userService->addUser();
        $users = self::$userService->listUser();
        $view = view('list-user')->with('users',$users)->render();

        return response()->json([
            'html' => $view,
            'message' => Message::ADD_USER_SUCCESS
        ]);
    }

    /**
     * Show Edit Modal
     * @Method Post
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View (edit)
     * @throws \Throwable
     */

    public function showEditForm(Request $request) {
        $user = self::$userService->findUserByUserId();
        return view('edit')->with('user',$user);
    }

    /**
     * Edit User
     * @Method Post
     * @param UserEdit $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View (list-user)
     * @throws \Throwable
     */

    public function editUser(UserEdit $request) {
         self::$userService->editUser();
        $users = self::$userService->listUser();
        $view = view('list-user')->with('users',$users)->render();
        return response()->json([
            'html' => $view,
            'message' => Message::EDIT_USER_SUCCESS
        ]);
    }

    /**
     * Show Modal to confirm delete
     * @Method Post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View (delete-confirm)
     */

    public function deleteConfirm() {
        $user = self::$userService->findUserByUserId();
        return view('delete-confirm')->with('user',$user);
    }

    /**
     * Delete User
     * @Method Post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View (list-user)
     * @throws \Throwable
     */

    public function deleteUser() {
        self::$userService->deleteUser();
        $users = self::$userService->listUser();
        $view = view('list-user')->with('users',$users)->render();
        return response()->json([
            'html' => $view,
            'message' => Message::DELETE_USER_SUCCESS
        ]);
    }

}