<?php

namespace Torralbodavid\DuckFunkCore\Listeners;

use Illuminate\Support\Facades\Log;
use SocialiteProviders\Manager\SocialiteWasCalled;

class FacebookLoginCalled
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param SocialiteWasCalled $event
     * @return void
     */
    public function handle(SocialiteWasCalled $event)
    {
    }
}
