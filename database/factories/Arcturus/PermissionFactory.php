<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Torralbodavid\DuckFunkCore\Models\Arcturus\Permission;

$factory->define(Permission::class, function (Faker $faker) {
    return [
        'id' => $faker->numberBetween(1, 1),
        'rank_name' => $faker->name,
        'prefix' => '',
        'prefix_color' => '',
        'duck_funk_housekeeping_read' => true,
        'duck_funk_housekeeping_write' => false,
        'duck_funk_housekeeping_approve' => false,
    ];
});
