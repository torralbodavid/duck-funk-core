<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Torralbodavid\DuckFunkCore\Models\Arcturus\Ban;

$factory->define(Ban::class, function (Faker $faker) {
    return [
        'ip' => $faker->ipv4,
        'machine_id' => $faker->macAddress,
        'user_staff_id' => $faker->numberBetween(1, 99),
        'timestamp' => now()->timestamp,
        'ban_reason' => $faker->text,
        'cfh_topic' => $faker->numberBetween(1, 99),
    ];
});
