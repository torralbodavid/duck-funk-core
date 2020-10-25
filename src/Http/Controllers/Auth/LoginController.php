<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Torralbodavid\DuckFunkCore\Rules\Captcha;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'mail';
    }

    public function logout()
    {
        Session::flush();

        return redirect(route('login'));
    }

    public function showLoginForm()
    {
        return view(template_namespace().'.auth.login');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'recaptcha_response' => [new Captcha],
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
}
