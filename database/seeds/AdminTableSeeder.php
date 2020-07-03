<?php

use App\Models\Admin;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        User::truncate();
        // create main admin account
        $user = User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => User::ADMIN,
        ]);
        Admin::create([
            'user_id' => $user->id,
            'admin_code' => 'AD00000',
            'name' => 'Nguyen Ba Tuan Nghia',
        ]);

        //create admins account
        factory('App\Models\Admin', 1)->create();
    }
}
