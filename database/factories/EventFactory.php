<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'title' => $faker->title,
        'code' => $faker->postcode,
        'location' => $faker->streetAddress,
        'summary' => $faker->realText(300),
        'image' => 'fakers/images/img_bg_' . rand(1, 50) . '.jpg',
        'type' => array_rand(Event::$type),
        'public_date' => $faker->dateTime('now'),
        'start_date' => $faker->dateTimeBetween('now', '+3 days'),
        'end_date' => $faker->dateTimeBetween('+3 days', '+6 days'),
        'voucher_id' => null,
        'point' => $faker->numerify('###'),
    ];
});
