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
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->numberBetween(1111111111, 9999999999),
        'email' => $faker->safeEmail,
        'username' => $faker->userName,
        'password' => $password ?: $password = bcrypt('password'),
        'remember_token' => str_random(10),
        'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});

$factory->define(App\Game::class, function (Faker\Generator $faker) {
    return [
        'admin_id' => factory(App\User::class)->create()->id,
        'capacity' => $faker->numberBetween(2,50),
        'time' => $faker->dateTimeThisMonth($max = 'now'),
        'type' => $faker->randomElement(['soccer', 'golf', 'volleyball']),
        'name' => $faker->word
    ];
});
