<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    public function showloginform()
    {
    	return view('admin.login');
    }

    protected $redirectTo= 'admin-home';

    public function login(Request $request)
    {
    	
        $this->validateLogin($request);
   
        if ($this->attemptLogin($request)) {
            //toastermessage('Welcome to TalkToMe','success');
            return $this->sendLoginResponse($request);
        }
        //toastermessage('Email & Password not Match','error');
        return $this->sendFailedLoginResponse($request);
    }
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('user')->logout();
        }
        return redirect('securepanel');
    }
}
