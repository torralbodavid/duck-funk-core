<?php

namespace Torralbodavid\DuckFunkCore\Http\Middleware;

use Closure;

class HousekeepingMiddleware
{
    public function handle($request, Closure $next)
    {
        return core()->user()->permissions->canReadHousekeeping() ? $next($request) : redirect('home')->with('status', 403);
    }
}
