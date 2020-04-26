<?php

namespace Torralbodavid\DuckFunkCore\Http\Middleware;

use Closure;
use Torralbodavid\DuckFunkCore\Models\CMS\Page;

class PageMiddleware
{
    public function handle($request, Closure $next)
    {
        $page = Page::where('route', $request->route('slug'))->where('active', true)->firstOrFail();
        $request->request->add(['page' => $page]);

        return (core()->user()->rank >= $page->min_rank) ? $next($request) : redirect('/');
    }
}
