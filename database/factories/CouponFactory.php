<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Models\Coupon;
use Faker\Generator as Faker;

$factory->define(Coupon::class, function (Faker $faker) {
    $value = array_rand(Coupon::$values);
    return [
        'name' => $faker->name,
        'title' => 'Giảm giá ' . Coupon::$values[$value],
        'code' => $faker->postcode,
        'image' => $faker->url,
        'type' => 1,
        'value' => $value,
    ];
});
