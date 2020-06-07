<?php

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::truncate();
        factory(Coupon::class, 20)->create();
    }
}
