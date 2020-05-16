<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    static $number = 1;
    return [
        'name' => $faker->name,
        'title' => $faker->title,
        'code' => $number++,
        'location' => $faker->streetAddress,
        'summary' => $faker->realText(300),
        'avatar' => 'fakers/images/img_bg_' . rand(1, 50) . '.jpg',
        'classify' => array_rand(Event::$classify),
        'type' => array_rand(Event::TYPE),
        'public_date' => $faker->dateTime('now'),
        'start_date' => $faker->dateTimeBetween('now', '+3 days'),
        'end_date' => $faker->dateTimeBetween('+3 days', '+6 days'),
        'voucher_id' => null,
        'ticket_number' => $faker->numerify('##000'),
        'point' => $faker->numerify('###'),
    ];
});
