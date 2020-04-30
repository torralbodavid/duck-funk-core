<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Torralbodavid\DuckFunkCore\Models\CMS\Page;

$factory->define(Page::class, function (Faker $faker) {
    return [
        'id' => $faker->randomNumber(),
        'title' => $faker->name,
        'slug' => $faker->slug,
        'route' => $faker->slug,
        'meta_title' => $faker->text(25),
        'meta_description' => $faker->text(),
        'min_rank' => 0,
        'parent_id' => 0,
        'active' => true,
        'no_robots' => false,
        'created_at' => now(),
        'updated_at' => now(),
        'published_at' => now(),
        'deleted_at' => null
    ];
});
