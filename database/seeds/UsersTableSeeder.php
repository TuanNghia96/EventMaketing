<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Classroom;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        // crete admin account
        User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => User::ADMIN,
        ]);


    }
}
