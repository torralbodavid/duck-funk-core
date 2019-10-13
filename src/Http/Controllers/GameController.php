<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Torralbodavid\DuckFunkCore\DuckFunkCore;
use Torralbodavid\DuckFunkCore\Models\Arcturus\Users;

class GameController extends Controller
{
    public static function generateSSO()
    {
        return 'DuckFunk-'.Str::random(25).'-SSO';
    }
}
