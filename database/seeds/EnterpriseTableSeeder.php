<?php

use App\Models\Enterprise;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class EnterpriseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Enterprise::truncate();

        $user = User::create([
            'email' => 'doanhnghiep@gmail.com',
            'password' => Hash::make('123456'),
            'role' => User::ENTERPRISE,
        ]);

        $code = sprintf("EP%05s", 1);
        Enterprise::create([
            'user_id' => $user->id,
            'enterprise_code' => $code,
            'name' => $faker->name,
            'address' => $faker->randomElement(Helper::getLocation()),
            'avatar' => 'fakers/enterprises/1_logo.png',
            'city' => array_rand(Enterprise::CITY),
            'phone' => $faker->phoneNumber,
            'bank_account' => $faker->bankAccountNumber,
        ]);

        for ($i = 2; $i <= 20; $i++) {
            //seeder user
            $user = User::create([
                'email' => $faker->unique()->email,
                'password' => Hash::make('123456'),
                'role' => User::ENTERPRISE,
            ]);

            $code = sprintf("EP%05s", $i);
            Enterprise::create([
                'user_id' => $user->id,
                'enterprise_code' => $code,
                'name' => $faker->name,
                'address' => $faker->randomElement(Helper::getLocation()),
                'avatar' => "fakers/enterprises/$i" . '_logo.png',
                'city' => array_rand(Enterprise::CITY),
                'phone' => $faker->phoneNumber,
                'bank_account' => $faker->bankAccountNumber,
            ]);
        }
    }
}
