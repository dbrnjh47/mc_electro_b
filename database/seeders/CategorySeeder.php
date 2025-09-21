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
        for ($i = 0; $i < 45; $i++) {
            $c = Category::create([
                "is_on" => rand(0,1),
                "preview" => (rand(0,10) > 7 ? null : "1.png"),
                // "slug" => str_replace('.', '', str_replace(' ', '_', strtolower(fake()->unique()->sentence(rand(1, 3))))),
                "name" => fake()->unique()->sentence(rand(1, 3)),
                "description" => fake()->text(rand(10, 35)),
            ]);

            if($i != 0 && rand(0,1))
            {
                for($count = 1; $count <= rand(1,3); $count++)
                {
                    Subcategory::factory(1)->create([
                        "category_parent_id" => $c->id,
                        "category_child_id" => rand(1, $i)
                    ]);
                }
            }
        }

    }
}
