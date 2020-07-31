<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pizza;
use Faker\Generator as Faker;

$factory->define(Pizza::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 20),
        'description' => $faker->text($maxNbChars = 200),
        'price' => $faker->numberBetween($min = 10, $max = 25),
        'image' => $faker->image('public/storage/images',640,480, null, false),        
    ];
});