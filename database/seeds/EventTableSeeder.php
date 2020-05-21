<?php

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Event::truncate();
        factory('App\Models\Event', 100)->create()->each(function ($event) {
            // Seed the relation with one address
            $voucher = factory(App\Models\Voucher::class)->create();
            $event->voucher_id = $voucher->id;
            $event->save();
        });
        factory('App\Models\Event', 50)->create();
    }
}
