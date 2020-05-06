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

        for ($i = 1; $i <= 20; $i++) {
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
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'bank_account' => $faker->bankAccountNumber,
            ]);
        }
    }
}
