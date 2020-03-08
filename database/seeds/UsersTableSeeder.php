<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
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
            'user_name' => 'admin',
            'password' => Hash::make('123456'),
            'role' => User::ADMIN,
        ]);


    }
}
