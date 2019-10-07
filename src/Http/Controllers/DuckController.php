<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Illuminate\Routing\Controller;
use Torralbodavid\DuckFunkCore\Models\Arcturus\Users;

class DuckController extends Controller
{
    public function __invoke()
    {
        $users = Users::where('mail', auth()->user()->email)->with('permissions')->first();

        return view('duck-funk-core::hello', ['hello' => $users->permissions()->first()->rank_name]);
    }
}
