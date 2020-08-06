<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\PlanPrice;
use Faker\Generator as Faker;

$factory->define(PlanPrice::class, function (Faker $faker) {
    return [
        'charge_id' => $faker->numberBetween(1, 2),
        'price' => $faker->randomElement([100, 2000, 3000, 800, 10000], 1),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
