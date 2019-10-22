<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Routing\Controller;

class GameController extends Controller
{
    public static function generateSSO()
    {
        return 'DuckFunk-'.Str::random(25).'-SSO';
    }

    public function showHotel()
    {
        dd('show client');
    }
}
