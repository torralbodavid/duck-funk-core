<?php

namespace Torralbodavid\DuckFunkCore;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;
use Torralbodavid\DuckFunkCore\Events\Avatar\UpdateAvatarEvent;
use Torralbodavid\DuckFunkCore\Listeners\FacebookLoginCalled;
use Torralbodavid\DuckFunkCore\Listeners\UserUpdate;

class DuckFunkEventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UpdateAvatarEvent::class => [
            UserUpdate::class,
        ],
        SocialiteWasCalled::class => [
            FacebookLoginCalled::class,
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

}
