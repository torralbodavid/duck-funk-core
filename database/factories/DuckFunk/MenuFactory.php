<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Torralbodavid\DuckFunkCore\Models\CMS\Menu;

$factory->define(Menu::class, function (Faker $faker) {
    return [
        'id' => $faker->randomNumber(),
        'title' => $faker->name,
        'slug' => $faker->slug,
        'min_rank' => 1,
        'active' => true,
        'created_at' => now(),
        'updated_at' => now(),
        'published_at' => now(),
    ];
});
