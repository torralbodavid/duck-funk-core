<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class AvatarController
{
    public function select()
    {
        return view('duck-funk-core::avatar.select', ['avatars' => User::where('mail', auth()->user()->email)->get()]);
    }
}
