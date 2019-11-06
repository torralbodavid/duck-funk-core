<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Illuminate\Routing\Controller;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class DuckController extends Controller
{
    public function __invoke()
    {
        $users = User::where('mail', auth()->user()->email)->with('permissions')->first();

        return view('duck-funk-core::hello', ['hello' => $users->permissions()->first()->rank_name]);
    }
}
