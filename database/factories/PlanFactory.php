<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Plan;
use Faker\Generator as Faker;

$factory->define(Plan::class, function (Faker $faker) {
    return [
        'title' => '江ノ島プラン',
        'body' => 'あああああああああああああああああああああ',
        'category' => $faker->randomElement([1, 2, 3], 1),
        'prefecture' => $faker->numberBetween(1, 47),
        'address' => $faker->address,
        'created_at' => now(),
        'updated_at' => now()
    ];

});
