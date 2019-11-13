<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Torralbodavid\DuckFunkCore\Http\Traits\RCONConnection;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class GameController extends Controller
{
    use RCONConnection;

    public static function generateSSO()
    {
        $setSSO = User::find(auth()->id());
        $setSSO->auth_ticket = 'DuckFunk-'.Str::random(25).'-SSO';
        $setSSO->save();

        return $setSSO->auth_ticket;
    }

    public function showHotel()
    {
        return view('duck-funk-core::hotel.hotel', ['sso' => $this::generateSSO()]);
    }
}
