<?php

use App\Models\Buyer;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Comment::truncate();
        DB::table('tickets')->truncate();
        $faker = Factory::create();
        $eventArr = Event::pluck('id')->toArray();
        $buyerArr = Buyer::pluck('id')->toArray();
        for ($i = 1; $i <= 50; $i++) {
            $buyerId = array_rand($buyerArr);
            $eventId = array_rand($eventArr);

            DB::table('tickets')->insert([
                'buyer_id' => $buyerId,
                'event_id' => $eventId,
            ]);
            DB::table('comments')->insert([
                'buyer_id' => $buyerId,
                'event_id' => $eventId,
                'rating' => $faker->numberBetween(1, 5),
                'message' => $faker->text(100),
            ]);
        }
    }
}
