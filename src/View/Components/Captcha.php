<?php

namespace Torralbodavid\DuckFunkCore\View\Components;

use Illuminate\Http\Request;
use Illuminate\View\Component;

class Captcha extends Component
{
    public $action;
    public $site_key;

    /**
     * Create a new component instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->action = $request->page->slug;
        $this->site_key = env('CAPTCHA_SITE_KEY', '');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('duck-funk-core::components.captcha');
    }
}
