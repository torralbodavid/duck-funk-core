<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Routing\Controller;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    use ConfirmsPasswords;
    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showConfirmForm()
    {
        return view('auth::passwords.confirm');
    }
}
