<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'classe_id' => function () {
            return factory('App\Classes')->create()->id;
        },
        'country_id' => function () {
            return factory('App\Country')->create()->id;
        },

        'name' => $faker->name,
        'date_of_birth' => $faker->date('Y_m_d'),
    ];
});
