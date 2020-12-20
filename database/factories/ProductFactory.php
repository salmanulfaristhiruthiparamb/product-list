<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'price' => $faker->randomDigit,
        'upload_speed' => $faker->randomDigit,
        'download_speed' => $faker->randomDigit,
        'technology' => $faker->randomElement([1,2]),
        'static_ip' => $faker->boolean()
    ];
});
