<?php

use App\Models\Supplier;
use App\Models\Event;
use Illuminate\Database\Seeder;

class SupplierEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplier_events')->truncate();

        $eventId = Event::pluck('id')->toArray();
        $supplierId = Supplier::pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            DB::table('supplier_events')->insert([
                'supplier_id' => array_rand($supplierId),
                'event_id' => array_rand($eventId),
                'role' => array_rand([1 => 1, 2 => 2]),
            ]);
        }
    }
}
