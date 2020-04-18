<?php

use App\Models\Buyer;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->truncate();

        $eventId = Event::pluck('id')->toArray();
        $buyerId = Buyer::pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            DB::table('tickets')->insert([
                'buyer_id' => array_rand($buyerId),
                'event_id' => array_rand($eventId),
            ]);
        }
    }
}
