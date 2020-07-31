<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'email' => $faker->text($maxNbChars = 20),
        'firstname' => $faker->text($maxNbChars = 20),
        'lastname' => $faker->text($maxNbChars = 20),
        'address' => $faker->text($maxNbChars = 20),
        'city' => $faker->text($maxNbChars = 20),
        'state' => $faker->text($maxNbChars = 20),
        'zip' => $faker->numberBetween($min = 10000, $max = 99999),
        'total_products' => $faker->numberBetween($min = 1, $max = 10),
        'total' => $faker->numberBetween($min = 18, $max = 135), 
    ];
});
