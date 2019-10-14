<?php

namespace Torralbodavid\DuckFunkCore;

use Illuminate\Support\ServiceProvider;
use Torralbodavid\DuckFunkCore\Models\Arcturus\Users;

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
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/duck-funk.php');

        $this->app['config']->set('auth.providers.avatars', [
            'driver' => 'eloquent',
            'model' => Users::class,
        ]);
        $this->app['config']->set('auth.guards.avatars', [
            'driver' => 'session',
            'provider' => 'avatars',
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('duck-funk.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/resources/views' => resource_path('views/vendor/duck-funk-core'),
            ], 'views');*/

            // Publishing assets.
              /*$this->publishes([
                __DIR__.'/resources/assets' => public_path('vendor/duck-funk-core'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/duck-funk-core'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
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
