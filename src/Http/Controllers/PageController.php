<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Illuminate\Http\Request;

class PageController
{
    public function getPage(Request $request)
    {
        $page = $request->page;

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
