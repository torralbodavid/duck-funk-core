<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RouteController extends Controller
{
    private $route;

    public function __invoke(Request $request)
    {
        dd($request);
        /*$this->route = collect(explode('/', $request->path()));

        $this->redirectTo($request);*/
    }

    /*
     * This method will redirect user to the proper controller
     */
    private function redirectTo(Request $request)
    {
        if ($request->getMethod() && $request->getMethod() == 'GET') {
            // Check if has parent_id
            if (! $this->hasParent($this->getLastRoute())) {
                return redirect()->action('UserController@profile');
            }
        }

        return abort(404);
    }

    /*
     * Check the route parent as we have in the database
     */
    private function hasParent(string $slug): bool
    {
        // TODO: Missing database connection
        return true;
    }

    /*
     * Count all slugs on route
     */
    private function getRouteCount(): int
    {
        return $this->route->count();
    }

    /*
     * Get the last route slug
     */
    private function getLastRoute(): string
    {
        return $this->route->last();
    }
}
