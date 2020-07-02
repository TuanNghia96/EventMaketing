<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Admin;
use App\Models\User;
use Faker\Generator as Faker;


$factory->define(Admin::class, function (Faker $faker) {
    $user = factory('App\Models\User')->create(['role' => User::SUPPLIER]);
    static $i = 1;
    $code = sprintf("AD%05s",   $i++);
    return [
        'user_id' => $user->id,
        'admin_code' => $code,
        'name' => $faker->name(),
        'birthday' => $faker->date('Y-m-d', 'now')
    ];
});
