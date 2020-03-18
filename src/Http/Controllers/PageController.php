<?php


namespace Torralbodavid\DuckFunkCore\Http\Controllers;


use Torralbodavid\DuckFunkCore\Models\CMS\Page;

class PageController
{
    public function getPage($slug = null)
    {
        $page = Page::where('route', $slug)->where('active', 1)->firstOrFail();

        $controller = "Http\Controllers\Pages\\".ucfirst($page->slug)."Controller";
        $response = view("duck-funk-core::{$page->slug}")->with('page', $page);


        if(! class_exists($controller)) {
            return $response;
        }

        $action = new $controller();

        return method_exists($action, 'index')
            ? $action->index($page)
            : $response;

    }
}
