<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Voucher;
use Faker\Generator as Faker;

$factory->define(Voucher::class, function (Faker $faker) {
    $value = array_rand(Voucher::$values);
    return [
        'name' => $faker->name,
        'title' => 'Giảm giá ' . Voucher::$values[$value],
        'code' => $faker->postcode,
        'image' => $faker->url,
        'type' => 1,
        'value' => $value,
    ];
});
