<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers\Housekeeping;

class HousekeepingController
{
    public function __invoke()
    {
        return view('housekeeping::dashboard');
    }
}
