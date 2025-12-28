<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category\Category;
use App\Models\Category\Subcategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(2)->create([
        //     "is_on" => 1,
        //     "category_parent_id" => null
        // ]);
        for($i = 0; $i < 6; $i++)
        {
            Category::factory(5)->create();
        }

    }
}
