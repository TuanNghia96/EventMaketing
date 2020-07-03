<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Supplier;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    $user = factory('App\Models\User')->create(['role' => User::SUPPLIER]);
    static $i = 1;

    return [
        'user_id' => $user->id,
        'supplier_code' => sprintf("SL%05s", $i++),
        'name' => $faker->name,
        'address' => $faker->randomElement(Helper::getLocation()),
        'avatar' => 'fakers/suppliers/1_logo.png',
        'city' => array_rand(Supplier::CITY),
        'phone' => $faker->phoneNumber,
        'bank_account' => $faker->bankAccountNumber,
    ];
});
