<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Torralbodavid\DuckFunkCore\Rules\Captcha;
use Torralbodavid\DuckFunkCore\Rules\UniqueUserMail;

class SettingsController extends Controller
{
    public function update(Request $request)
    {
        $currentPasswordRules = '';
        $newPasswordRules = '';

        if ($request->input('password') !== null) {
            $currentPasswordRules = 'required|password';
            $newPasswordRules = 'required|confirmed|min:6';
        }

        $validatedData = $request->validate([
            'recaptcha_response' => ['required', new Captcha],
            'email' => ['required', new UniqueUserMail],
            'current_password' => $currentPasswordRules,
            'password' => $newPasswordRules,
        ]);

        $user = core()->user();
        $user->mail = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        Session::flash('status', 'success');

        return view(template_namespace().'.'.$this->page->slug, $this->data);
    }
}
