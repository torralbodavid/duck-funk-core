<?php


namespace Torralbodavid\DuckFunkCore\Http\Controllers;


use Torralbodavid\DuckFunkCore\Models\CMS\Page;

class PageController
{
    public function getPage($slug = null)
    {
        $page = Page::where('route', $slug)->where('active', 1)->firstOrFail();

        return view("duck-funk-core::{$page->slug}")->with('page', $page);
    }
}
