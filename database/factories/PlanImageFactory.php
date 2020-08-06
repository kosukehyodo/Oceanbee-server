<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\PlanImage;
use Faker\Generator as Faker;

$factory->define(PlanImage::class, function (Faker $faker) {
    return [
        'image' => 'plan/1/aMlJVpBKiaN8yCzqtnkgeZtKHUBs6slTrCNfsP8v.jpeg',
        'body' => '海まで5分！',
        'created_at' => now(),
        'updated_at' => now()
    ];
});
