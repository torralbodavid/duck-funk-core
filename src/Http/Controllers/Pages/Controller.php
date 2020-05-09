<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Torralbodavid\DuckFunkCore\Models\CMS\Page;

abstract class Controller extends BaseController
{
    private Page $page;
    private array $data;

    public function __construct()
    {
        $this->page = request()->page;

        $this->data = $this->getData();
        $this->data['page'] = $this->page;
    }

    public function index()
    {
        return view(template_namespace().'.'.$this->page->slug, $this->data);
    }

    public function update(Request $request)
    {
        return abort(404);
    }

    /**
     * @return array
     */
    protected function getData(): array
    {
        return [];
    }
}
