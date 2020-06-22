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
        $faker = Factory::create();
        Admin::truncate();
        // crete admin account
        Admin::create([
            'user_id' => 1,
            'admin_code' => 'AD00000',
            'name' => 'Nguyen Ba Tuan Nghia',
        ]);
        for ($i = 2; $i <= 20; $i++) {
            //seeder user
            $user = User::create([
                'email' => $faker->unique()->email,
                'password' => Hash::make('123456'),
                'role' => User::ADMIN,
            ]);

            $code = sprintf("AD%05s",   $i);
            Admin::create([
                'user_id' => $user->id,
                'admin_code' => $code,
                'name' => $faker->name(),
                'birthday' => $faker->date('Y-m-d', 'now')
            ]);
        }
    }
}
