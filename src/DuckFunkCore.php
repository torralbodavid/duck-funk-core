<?php

namespace Torralbodavid\DuckFunkCore;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Torralbodavid\DuckFunkCore\Models\CMS\Page;

class DuckFunkCore
{
    /*
     * Package version
     */
    const PACKAGE_VERSION = '0.4.2';

    protected ?Authenticatable $user;
    protected Page $page;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function user(): ?Authenticatable
    {
        return $this->user;
    }

    public function page($slug = null): string
    {
        $this->page = Page::where('route', $slug)->firstOrFail();

        return $this->page->route;
    }
}
