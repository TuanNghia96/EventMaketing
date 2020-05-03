<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $endDate = $faker->dateTime(\Carbon\Carbon::now());
    $startDate = $faker->dateTime($endDate);
    $publicDate = $faker->dateTime($startDate);
    return [
        'name' => $faker->name,
        'title' => $faker->title,
        'code' => $faker->postcode,
        'location' => $faker->locale,
        'sumary' => $faker->realText(300),
        'image' => 'fakers/images/img_bg_' . rand(1, 50) . '.jpg',
        'type' => array_rand(Event::$type),
        'public_date' => $publicDate,
        'start_date' => $startDate,
        'end_date' => $endDate,
        'voucher_id' => null,
        'point' => $faker->numerify('###'),
    ];
});
