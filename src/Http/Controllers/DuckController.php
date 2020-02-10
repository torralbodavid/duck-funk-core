<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Illuminate\Routing\Controller;

class DuckController extends Controller
{
    public function __invoke()
    {
        return view('duck-funk-core::hello');
    }
}
