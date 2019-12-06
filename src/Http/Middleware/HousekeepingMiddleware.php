<?php

namespace Torralbodavid\DuckFunkCore\Http\Middleware;

use Closure;
use Torralbodavid\DuckFunkCore\DuckFunkCore;

class HousekeepingMiddleware
{
    public function handle($request, Closure $next)
    {
        return core()->user()->permissions->canReadHousekeeping() ? $next($request) : redirect('home')->with('status', 403);
    }
}
