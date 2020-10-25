<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Torralbodavid\DuckFunkCore\Models\CMS\Page;

abstract class Controller extends BaseController
{
    protected Page $page;
    protected array $data;

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

    /**
     * @return array
     */
    protected function getData(): array
    {
        return [];
    }
}
