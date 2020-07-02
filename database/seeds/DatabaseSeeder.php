<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

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

        $this->call(AdminTableSeeder::class);
        $this->call(BuyerTableSeeder::class);
        $this->call(SupplierTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(CouponTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(SupplierEventTableSeeder::class);
        $this->call(TicketsTableSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
