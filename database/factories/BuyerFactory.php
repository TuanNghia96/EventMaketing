<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Buyer;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Buyer::class, function (Faker $faker) {
    $user = factory('App\Models\User')->create(['role' => User::BUYER]);
    static $i = 1;
    $code = sprintf("BY%05s",   $i++);
    return [
        'user_id' => $user->id,
        'buyer_code' => $code,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'avatar' => 'fakers/buyers/avatar.jpg',
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'bank_account' => $faker->bankAccountNumber,
    ];
});
