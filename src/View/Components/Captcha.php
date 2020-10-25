<?php

namespace Torralbodavid\DuckFunkCore\View\Components;

use Illuminate\View\Component;

class Captcha extends Component
{
    public $site_key;
    public $form;

    /**
     * Create a new component instance.
     *
     * @param $form
     */
    public function __construct($form)
    {
        $this->site_key = config('duck-funk.captcha.site_key');
        $this->form = $form;
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
