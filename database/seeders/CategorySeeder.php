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
        $categories = Category::factory(30)->create();

        foreach($categories as $category)
        {
            if($category->id < 25)
            {
                $count = rand(1, 3);
                $sub_categories = $categories->filter(function ($item) use ($category) {
                    return $item->id > $category->id;
                })->shuffle()->take($count);

                foreach($sub_categories as $sub_category)
                {
                    Subcategory::factory(1)->create([
                        'category_child_id' => $sub_category->id,
                        'category_parent_id' => $category->id,
                    ]);
                }

            }
        }
    }
}
