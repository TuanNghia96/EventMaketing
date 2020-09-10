<?php

use App\Models\Supplier;
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

        // create main buyer account
        $user = User::create([
            'email' => 'doanhnghiep@gmail.com',
            'password' => Hash::make('123456'),
            'role' => User::SUPPLIER,
        ]);
        Supplier::create([
            'user_id' => $user->id,
            'supplier_code' => sprintf("EP%05s", 1),
            'name' => $faker->name,
            'address' => $faker->randomElement(Helper::getLocation()),
            'avatar' => 'fakers/suppliers/1_logo.png',
            'city' => array_rand(Supplier::CITY),
            'phone' => $faker->phoneNumber,
            'bank_account' => $faker->bankAccountNumber,
        ]);

        //create buyers account
        factory('App\Models\Supplier', 10)->create();
    }
}
