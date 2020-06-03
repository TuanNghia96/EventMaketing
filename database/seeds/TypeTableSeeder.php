<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::truncate();
        foreach (Type::TYPES as $value){
            Type::create([
                'name' => $value,
            ]);
        }
    }
}
