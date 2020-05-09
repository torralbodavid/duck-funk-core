<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Illuminate\Http\Request;

class PageController
{
    public function __invoke(Request $request)
    {
        $page = $request->page;
        $method = 'index';

        if($request->isMethod('get')) {
            $method = 'index';
        } elseif($request->isMethod('post')) {
            $method = 'update';
        }

        $packageController = package_namespace().'\Http\Controllers\Pages\\'.ucfirst($page->slug).'Controller';
        $projectController = 'App\Http\Controllers\Pages\\'.ucfirst($page->slug).'Controller';

        $controller = class_exists($projectController)
            ? $projectController
            : $packageController;

        if (! view()->exists(template_namespace().".{$page->slug}") && ! class_exists($controller)) {
            return abort(404);
        }

        if (view()->exists(template_namespace().".{$page->slug}") && ! class_exists($controller)) {
            return view(template_namespace().".{$page->slug}")->with('page', $page);
        }

        $action = new $controller();

        return method_exists($action, $method)
            ? $action->$method($request, $page)
            : abort(404);
    }
}
