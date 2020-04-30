<?php

namespace Torralbodavid\DuckFunkCore\Tests;

use Torralbodavid\DuckFunkCore\DuckFunkCoreServiceProvider;
use Torralbodavid\DuckFunkCore\Models\Arcturus\Permissions;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__.'/../tests/database/migrations');
        $this->withFactories(__DIR__.'/../database/factories');

        $this->user = factory(User::class)->create();
        $this->permissions = factory(Permissions::class)->create(['id' => 0, 'rank_name' => 'Test']);
        $this->be($this->user);
    }

    protected function makeAuth()
    {
        return $this->be($this->user);
    }

    protected function getPackageProviders($app)
    {
        return DuckFunkCoreServiceProvider::class;
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}
