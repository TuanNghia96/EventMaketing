<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Classroom;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

$factory->define(Classroom::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
