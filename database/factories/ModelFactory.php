<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Team::class, function (Faker\Generator $faker) {
    return [
        'tournament_id' => 1,
        'team_number' => $faker->buildingNumber,
        'team_name' => $faker->streetName,
        'logo' => null,
    ];
});

$factory->define(App\Sponsor::class, function (Faker\Generator $faker) {
    return [
        'tournament_id' => 1,
        'rank' => $faker->numberBetween(1,3),
        'sponsor_image' => $faker->imageUrl(300, 300, 'cats'),
        'duration' => $faker->randomElement($array = array (5,10,15,20,30)),
    ];
});

