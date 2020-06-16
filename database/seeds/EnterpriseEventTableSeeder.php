<?php

use App\Models\Enterprise;
use App\Models\Event;
use Illuminate\Database\Seeder;

class EnterpriseEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enterprise_events')->truncate();

        $eventId = Event::pluck('id')->toArray();
        $enterpriseId = Enterprise::pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            DB::table('enterprise_events')->insert([
                'enterprise_id' => array_rand($enterpriseId),
                'event_id' => array_rand($eventId),
                'role' => array_rand([1 => 1, 2 => 2]),
            ]);
        }
    }
}
