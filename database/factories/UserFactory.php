<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'display_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verify_token' => Str::random(30),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'status' => 1,
        'image' => 'user/1/3VZxL8WIHENHVUnOuijJoYF98zkrOJnzWGVnuK48.jpeg',
        'profile' => 'よろしくお願い申し上げます。よろしくお願い申し上げます。よろしくお願い申し上げます。'
    ];
});
