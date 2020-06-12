<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Category;
use App\Models\Event;
use App\Models\Type;
use Database\Factories\ExampleFactory;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    static $number = 1;
    $couponId = \App\Models\Coupon::pluck('name', 'id')->toArray();
    return [
        'name' => $faker->name,
        'title' => $faker->title,
        'code' => $number++,
        'location' => $faker->randomElement(Helper::getLocation()),
        'summary' => $faker->realText(300),
        'avatar' => 'fakers/events/faker_bg_' . rand(1, 50) . '.jpg',
        'images' => json_encode([
            [
                'title' => 'title2',
                'image' => 'fakers/events/faker_bg_' . rand(1, 50) . '.jpg'
            ],
            [
                'title' => 'title2',
                'image' => 'fakers/events/faker_bg_' . rand(1, 50) . '.jpg'
            ],
            [
                'title' => 'title2',
                'image' => 'fakers/events/faker_bg_' . rand(1, 50) . '.jpg'
            ]
        ]),
        'type_id' => $faker->randomElement(Type::pluck('id')),
        'category_id' => $faker->randomElement(Category::pluck('id')),
        'public_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+5 months'),
        'start_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+5 months'),
        'end_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+5 months'),
        'coupon_id' => array_rand($couponId),
        'ticket_number' => $faker->numerify('##000'),
        'point' => $faker->numberBetween(0, 1000),
        'status' => array_rand(Event::$status)
    ];
});
