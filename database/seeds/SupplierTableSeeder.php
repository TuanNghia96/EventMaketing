<?php

use App\Models\supplier;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Supplier::truncate();

        $user = User::create([
            'email' => 'doanhnghiep@gmail.com',
            'password' => Hash::make('123456'),
            'role' => User::SUPPLIER,
        ]);

        $code = sprintf("EP%05s", 1);
        Supplier::create([
            'user_id' => $user->id,
            'supplier_code' => $code,
            'name' => $faker->name,
            'address' => $faker->randomElement(Helper::getLocation()),
            'avatar' => 'fakers/suppliers/1_logo.png',
            'city' => array_rand(Supplier::CITY),
            'phone' => $faker->phoneNumber,
            'bank_account' => $faker->bankAccountNumber,
        ]);

        for ($i = 2; $i <= 20; $i++) {
            //seeder user
            $user = User::create([
                'email' => $faker->unique()->email,
                'password' => Hash::make('123456'),
                'role' => User::SUPPLIER,
            ]);

            $code = sprintf("SL%05s", $i);
            Supplier::create([
                'user_id' => $user->id,
                'supplier_code' => $code,
                'name' => $faker->name,
                'address' => $faker->randomElement(Helper::getLocation()),
                'avatar' => "fakers/suppliers/$i" . '_logo.png',
                'city' => array_rand(Supplier::CITY),
                'phone' => $faker->phoneNumber,
                'bank_account' => $faker->bankAccountNumber,
            ]);
        }
    }
}
