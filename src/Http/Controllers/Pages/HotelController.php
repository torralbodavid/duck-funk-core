<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers\Pages;

use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Torralbodavid\DuckFunkCore\Http\Traits\RCONConnection;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class HotelController extends Controller
{
    use RCONConnection;

    public function index()
    {
        return view('duck-funk-core::hotel.hotel', ['sso' => $this->generateSSO()]);
    }

    private function generateSSO()
    {
        $setSSO = auth()->user();
        $setSSO->auth_ticket = 'DuckFunk-'.Str::random(25).'-SSO';
        $setSSO->save();

        return $setSSO->auth_ticket;
    }
}
