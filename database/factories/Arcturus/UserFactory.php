<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'mail' => $faker->email,
        'password' => $faker->password(6, 64),
        'account_created' => $faker->unixTime,
        'ip_register' => $faker->ipv4,
        'ip_current' => $faker->ipv4,
    ];
});
