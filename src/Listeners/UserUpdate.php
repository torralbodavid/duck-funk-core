<?php

namespace Torralbodavid\DuckFunkCore\Listeners;

use Torralbodavid\DuckFunkCore\Events\Avatar\UpdateAvatarEvent;

class UserUpdate
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
     * @param UpdateAvatarEvent $event
     * @return void
     */
    public function handle(UpdateAvatarEvent $event)
    {
    }
}
