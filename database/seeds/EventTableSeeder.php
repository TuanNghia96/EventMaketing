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
        Event::truncate();
        factory('App\Models\Event', 100)->create();
        factory('App\Models\Event', 50)->create();
    }
}
