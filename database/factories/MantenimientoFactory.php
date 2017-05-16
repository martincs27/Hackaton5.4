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
$factory->define(App\Mantenimiento::class, function (Faker\Generator $faker) {

    return [
        'fechainicio' => $faker->dateTimeBetween('-2 years','-1 years'),
        'fechafin' => $faker->dateTimeBetween('-1 years','+1 years'),
    ];
});