<?php

use Faker\Factory;

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
