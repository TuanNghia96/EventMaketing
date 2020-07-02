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

        // create main buyer account
        $user = User::create([
            'email' => 'nguyenbatuannghia5996@gmail.com',
            'password' => Hash::make('123456'),
            'role' => User::BUYER,
        ]);
        Buyer::create([
            'user_id' => $user->id,
            'buyer_code' => 'BY00000',
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'avatar' => 'fakers/buyers/avatar.jpg',
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'bank_account' => $faker->bankAccountNumber,
        ]);

        //create buyers account
        factory('App\Models\Buyer', 50)->create();
    }
}
