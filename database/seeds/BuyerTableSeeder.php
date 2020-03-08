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

        for ($i = 1; $i <= 20; $i++) {
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
                'avatar' => $faker->imageUrl(70, 70),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'bank_account' => $faker->bankAccountNumber,
            ]);
        }
    }
}
