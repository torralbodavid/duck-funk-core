<?php

namespace Torralbodavid\DuckFunkCore;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiServiceProvider;
use Torralbodavid\DuckFunkCore\Core\Menu;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;
use Torralbodavid\DuckFunkCore\Models\Housekeeping\News;
use Torralbodavid\DuckFunkCore\Observers\NewsObserver;
use Torralbodavid\DuckFunkCore\Observers\UserObserver;

class DuckFunkCoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'duck-funk-core');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'duck-funk-core');
        $this->loadViewsFrom(__DIR__.'/resources/views/housekeeping', 'housekeeping');
        $this->loadViewsFrom(__DIR__.'/resources/views/auth', 'auth');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/duck-funk.php');
        $this->loadRoutesFrom(__DIR__.'/routes/duck-funk-api.php');

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('duck-funk.php'),
        ], 'duck-funk-core/config');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/duck-funk-core/'),
        ], 'duck-funk-core/views');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/duck-funk-core'),
        ], 'duck-funk-core/assets');

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/duck-funk-core'),
        ], 'lang');*/

        // Registering package commands.
        // $this->commands([]);
        User::observe(UserObserver::class);
        News::observe(NewsObserver::class);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton('duck-funk-core', fn() => new DuckFunkCore);

        $this->app->singleton(Menu::class);
        $this->app->register(UiServiceProvider::class);
        $this->app->register(DuckFunkEventServiceProvider::class);

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'duck-funk');
    }
}
