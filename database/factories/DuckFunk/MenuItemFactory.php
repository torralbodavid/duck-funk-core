<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Torralbodavid\DuckFunkCore\Models\CMS\MenuItems;

$factory->define(MenuItems::class, function (Faker $faker) {
    return [
        'id' => $faker->randomNumber(),
        'parent_id' => 0,
        'order' => 0,
        'external_url' => null,
        'active' => true,
        'created_at' => now(),
        'updated_at' => now(),
        'published_at' => now(),
    ];
});
