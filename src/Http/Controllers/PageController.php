<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Torralbodavid\DuckFunkCore\Models\CMS\Page;

class PageController
{
    public function getPage($slug = null)
    {
        $page = Page::where('route', $slug)->where('active', true)->firstOrFail();

        $controller = "App\Http\Controllers\Pages\\".ucfirst($page->slug).'Controller';

        if (! view()->exists("duck-funk-core::{$page->slug}")) {
            abort(404);
        }

        $response = view("duck-funk-core::{$page->slug}")->with('page', $page);

        if (! class_exists($controller)) {
            return $response;
        }

        $action = new $controller();

        return method_exists($action, 'index')
            ? $action->index($page)
            : $response;
    }
}
