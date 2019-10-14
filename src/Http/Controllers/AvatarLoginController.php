<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Illuminate\Http\Request;

class AvatarLoginController
{
    public function login(Request $request)
    {
        $credentials = [
            'username' => 'secondsaccount',
            'password' => 'alfalfa123',
        ];

        if (auth()->guard('avatars')->attempt($credentials)) {
            return redirect()->intended(route('home'));
        } else {
            die('ha donat error!');
            //return redirect()->back();
        }
    }
}
