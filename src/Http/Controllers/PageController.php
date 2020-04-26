<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Illuminate\Http\Request;

class PageController
{
    public function __invoke(Request $request)
    {
        $page = $request->page;

        $controller = package_namespace().'\Http\Controllers\Pages\\'.ucfirst($page->slug).'Controller';

        if (! view()->exists("duck-funk-core::{$page->slug}") && ! class_exists($controller)) {
            return abort(404);
        }

        if (! class_exists($controller)) {
            return abort(404);
        }

        if (view()->exists("duck-funk-core::{$page->slug}")) {
            $response = view("duck-funk-core::{$page->slug}")->with('page', $page);
        }

        $action = new $controller();

        return method_exists($action, 'index')
            ? $action->index($page)
            : $response;
    }

}
