<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Category;
use App\Models\Event;
use App\Models\Type;
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
        'type_id' => $faker->randomElement(Type::pluck('id')),
        'category_id' => $faker->randomElement(Category::pluck('id')),
        'public_date' => $faker->dateTimeThisYear('now'),
        'start_date' => $faker->dateTimeThisYear('+3 days'),
        'end_date' => $faker->dateTimeThisYear( '+6 days'),
        'voucher_id' => null,
        'ticket_number' => $faker->numerify('##000'),
        'point' => $faker->numerify('###'),
        'status' => array_rand(Event::$status)
    ];
});
