<?php

use App\Models\Buyer;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BuyerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Buyer::truncate();

        $user1 = User::create([
            'email' => 'nguyenbatuannghia5996@gmail.com',
            'user_name' => 'Khach Hang',
            'password' => Hash::make('123456'),
            'role' => User::BUYER,
        ]);
        Buyer::create([
            'user_id' => $user1->id,
            'buyer_code' => 'BY00001',
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'avatar' => 'fakers/buyers/avatar.jpg',
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'bank_account' => $faker->bankAccountNumber,
        ]);

        for ($i = 2; $i <= 20; $i++) {
            //seeder user
            $user = User::create([
                'email' => $faker->unique()->email,
                'user_name' => $faker->unique()->name,
                'password' => Hash::make('123456'),
                'role' => User::BUYER,
            ]);
            $code = sprintf("BY%05s",   $i);
            Buyer::create([
                'user_id' => $user->id,
                'buyer_code' => $code,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'avatar' => 'fakers/buyers/avatar.jpg',
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'bank_account' => $faker->bankAccountNumber,
            ]);
        }
    }
}
