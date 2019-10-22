<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Torralbodavid\DuckFunkCore\Models\Arcturus\Users;

class AvatarController
{
    public function select()
    {
        return view('duck-funk-core::avatar.select', ['avatars' => Users::where('mail', auth()->user()->email)->get()]);
    }
}
