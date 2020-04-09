<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);

        if(!auth()->attempt($loginData)) {
            return redirect('/login')->with('error','Invalid Credentials');
        }

        return redirect('dashboard2')->with('success','<h6 style="color:white;padding-top:10px"><strong>Welcome To VERTIGO</strong></h6>');

    }

    public function logout(Request $request)
    {
        if (auth()->user()) {
            $this->guard()->logout();
            if ($request->session()->has('password_updated')) {
                $request->session()->invalidate();
                $request->session()->flash('success', 'Password Test');
            } else {
                $request->session()->invalidate();
            }
        }

        return redirect('/');
    }
}
