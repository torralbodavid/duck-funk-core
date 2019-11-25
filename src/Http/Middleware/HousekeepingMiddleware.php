<?php

namespace Torralbodavid\DuckFunkCore\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Torralbodavid\DuckFunkCore\DuckFunkCore;
use Torralbodavid\DuckFunkCore\Models\Arcturus\Bans;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class HousekeepingMiddleware
{
    public function handle($request, Closure $next)
    {
        return DuckFunkCore::canSeeHousekeeping() ? $next($request) : redirect('home')->with('status', 403);
    }

}
