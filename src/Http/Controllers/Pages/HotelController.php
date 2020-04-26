<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers\Pages;

use Illuminate\Support\Str;
use Torralbodavid\DuckFunkCore\Http\Traits\RCONConnection;

class HotelController extends Controller
{
    use RCONConnection;

    private function generateSSO()
    {
        $setSSO = auth()->user();
        $setSSO->auth_ticket = 'DuckFunk-'.Str::random(25).'-SSO';
        $setSSO->save();

        return $setSSO->auth_ticket;
    }

    protected function getData(): array
    {
        return [
          'sso' => $this->generateSSO()
        ];
    }


}
