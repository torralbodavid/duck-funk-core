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

    public function getUser()
    {
        return User::find(Auth::id());
    }

    public function canSeeHousekeeping()
    {
        return $this->getUser()->permissions->canReadHousekeeping();
    }
}
