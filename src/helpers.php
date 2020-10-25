<?php

use Faker\Factory;
use Torralbodavid\DuckFunkCore\Core\Menu;

function core()
{
    return app('duck-funk-core');
}

function faker($property = null)
{
    $faker = Factory::create();

    if ($property) {
        return $faker->{$property};
    }

    return $faker;
}

function package_namespace(): string
{
    return 'Torralbodavid\DuckFunkCore';
}

function template_namespace(): string
{
    return 'duck-funk-core::'.config('duck-funk.template');
}

function menu(): Menu
{
    return app(Menu::class);
}
