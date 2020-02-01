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
        Log::info('ei que tal');
    }

    /**
     * Handle the event.
     *
     * @param SocialiteWasCalled $event
     * @return void
     */
    public function handle(SocialiteWasCalled $event)
    {
        Log::info('ei que tal');
        // Access the order using $event->order...
    }
}
