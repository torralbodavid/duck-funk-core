<?php

namespace Torralbodavid\DuckFunkCore;

use Illuminate\Support\Facades\Auth;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class DuckFunkCore
{
    /*
     * Package version
     */
    const PACKAGE_VERSION = '0.1.0';

    protected User $user;

    public function __construct()
    {
        $this->user = User::find(Auth::id());
    }

    public function user(): User { return User::find(Auth::id()); }
}
