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
        $supplierArr = \App\Models\Supplier::pluck('id')->toArray();
        factory('App\Models\Event', 600)->create()->each(function ($event) use ($supplierArr){
            $event->suppliers()->sync([array_rand($supplierArr) => ['role' => 1]]);
        });
    }
}
