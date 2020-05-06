<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(UsersTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(BuyerTableSeeder::class);
        $this->call(EnterpriseTableSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
