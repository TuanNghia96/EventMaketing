<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $endDate = $faker->date(\Carbon\Carbon::now());
    $startDate = $faker->date('Y-m-d',$endDate);
    $publicDate = $faker->date('Y-m-d',$startDate);
    $hasVoucher = $faker->boolean;
    return [
        'name' => $faker->name,
        'title' => $faker->title,
        'code' => $faker->postcode,
        'location' => $faker->locale,
        'sumary' => $faker->text(50),
        'image' => $faker->url,
        'type' => array_rand(Event::$type),
        'public_date' => $publicDate,
        'start_date' => $startDate,
        'end_date' => $endDate,
        'has_voucher' => $hasVoucher,
        'voucher_id' => $hasVoucher ? 123 : 0,
        'point' => $faker->numerify('###'),
    ];
});
