<?php

function core()
{
    return app('duck-funk-core');
}

function faker($property = null)
{
    $faker = \Faker\Factory::create();

    if ($property) {
        return $faker->{$property};
    }

    return $faker;
}
