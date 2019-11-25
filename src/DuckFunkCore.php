<?php

namespace Torralbodavid\DuckFunkCore;

use Illuminate\Support\Facades\Auth;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class DuckFunkCore
{
    /*
     * Package version
     */
    const PACKAGE_VERSION = '0.0.2';

    public static function getUser()
    {
        return User::find(Auth::id());
    }

    public static function canSeeHousekeeping()
    {
        return self::getUser()->permissions->canReadHousekeeping();
    }
}
