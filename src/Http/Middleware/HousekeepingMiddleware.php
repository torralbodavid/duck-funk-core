<?php

namespace Torralbodavid\DuckFunkCore\Http\Middleware;

use Closure;
use phpDocumentor\Reflection\Types\Collection;
use Torralbodavid\DuckFunkCore\DuckFunkCore;

class HousekeepingMiddleware
{
    public function handle($request, Closure $next)
    {
        dd($this->constructMenu());
        return core()->canSeeHousekeeping() ? $next($request) : redirect('home')->with('status', 403);
    }

    /*
     * This will construct housekeeping menu easily
     */
    private function constructMenu(): Collection
    {
        $menu = collect();

        $menu->add([
            'overview' => [
                'item' => [
                    'name' => 'Dashboard',
                    'link' => route('housekeeping'),
                    'target' => '_self', // todo: make self default and avoid to write if is not it's _blank
                    'icon' => 'ion ion-md-speedometer',
                    'submenu' => 'false' // todo: make false default and avoid to write if there is no submenu
                ]
            ],
            'moderation' => [
                'item' => [
                    'name' => 'Dashboard',
                    'link' => route('housekeeping'),
                    'target' => '_self', // todo: make self default and avoid to write if is not it's _blank
                    'icon' => 'ion ion-md-speedometer',
                    'submenu' => 'false' // todo: make false default and avoid to write if there is no submenu
                ]
            ]
        ]);

        return $menu->all();
    }
}
