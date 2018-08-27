<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Message;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\UserLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function email()
    {
        return 'email';
    }

    public function getLogin(){
        return view('login',['email'=>Cookie::get($this->email())]);
    }

    public function login(UserLogin $request){
        $message = Message::IN_VALID_LOGIN;
        $error = ['error_message' => $message];
        if($this->attemptLogin($request)){
            $cookie_email = $request->email ? $request->email : null;
            return redirect('/')->withCookie(cookie($this->email(), $cookie_email, 43200));
        }
        return redirect()->back()
            ->withInput($request->only('email', 'password'))
            ->withErrors($error);

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }
}
