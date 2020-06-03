<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        foreach (Category::CATEGORIES as $value){
            Category::create([
                'name' => $value,
            ]);
        }
    }
}
