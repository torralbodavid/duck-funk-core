<?php

namespace Torralbodavid\DuckFunkCore;

use Illuminate\Support\ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;
use Torralbodavid\DuckFunkCore\Listeners\FacebookLoginCalled;

class DuckFunkEventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        SocialiteWasCalled::class => [
            FacebookLoginCalled::class,
        ],
    ];

}
