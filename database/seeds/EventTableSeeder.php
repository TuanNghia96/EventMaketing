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
        $enpArr = \App\Models\Enterprise::pluck('id')->toArray();
        factory('App\Models\Event', 200)->create()->each(function ($event) use ($enpArr){
            $event->enterprises()->sync([array_rand($enpArr) => ['role' => 1]]);
        });
    }
}
