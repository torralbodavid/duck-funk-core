<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    protected function validateEmail(Request $request)
    {
        $request->validate(['mail' => 'required|email']);
    }

    protected function credentials(Request $request)
    {
        return $request->only('mail');
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()
            ->withInput($request->only('mail'))
            ->withErrors(['mail' => trans($response)]);
    }
}
