<?php

namespace Torralbodavid\DuckFunkCore;

use Illuminate\Support\ServiceProvider;
use Torralbodavid\DuckFunkCore\Models\Housekeeping\News;
use Torralbodavid\DuckFunkCore\Observers\NewsObserver;

class DuckFunkCoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */

        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'duck-funk-core');
        $this->loadViewsFrom(__DIR__.'/resources/views/'.config('duck-funk.template'), 'duck-funk-core');
        $this->loadViewsFrom(__DIR__.'/resources/views/housekeeping', 'housekeeping');
        $this->loadViewsFrom(__DIR__.'/resources/views/auth', 'auth');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/duck-funk.php');

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('duck-funk.php'),
        ], 'duck-funk-core/config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/duck-funk-core'),
        ], 'views');*/

        // Publishing assets.
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/duck-funk-core'),
            __DIR__.'/resources/assets/images' => public_path('vendor/duck-funk-core/images'),
        ], 'duck-funk-core/assets');

        // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/duck-funk-core'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        News::observe(NewsObserver::class);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'duck-funk');

        // Register the main class to use with the facade
        $this->app->singleton('duck-funk-core', function () {
            return new DuckFunkCore;
        });
    }
}
