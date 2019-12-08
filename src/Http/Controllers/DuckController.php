<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Illuminate\Routing\Controller;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class DuckController extends Controller
{
    public function __invoke()
    {

        return view('duck-funk-core::hello', ['hello' => core()->user()->permissions->name]);
    }
}
