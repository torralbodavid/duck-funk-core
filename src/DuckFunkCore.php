<?php

namespace Torralbodavid\DuckFunkCore;

use Illuminate\Support\Facades\Auth;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;
use Torralbodavid\DuckFunkCore\Models\CMS\Page;

class DuckFunkCore
{
    /*
     * Package version
     */
    const PACKAGE_VERSION = '0.4.2';

    protected User $user;

    public function __construct()
    {
        $this->user = User::find(Auth::user()->id);
    }

    public function user(): User
    {
        return $this->user;
    }

    public function page($slug = null): string
    {
        $page = Page::where('route', $slug)->firstOrFail();

        return $page->route;
    }
}
