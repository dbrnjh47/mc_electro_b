<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Services\Models\LocaleModelService;
use App\Models\Category\Category;
use App\Models\Category\CategoryLocal;
use App\Models\Category\Subcategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = (new LocaleModelService)->get();
        for ($i = 0; $i < 45; $i++) {
            $c = Category::create([
                "is_on" => rand(0,1),
                "slug" => str_replace('.', '', str_replace(' ', '_', strtolower(fake()->unique()->sentence(rand(1, 3))))),
            ]);
            foreach ($locales as $local) {
                $model = new CategoryLocal();
                $model->setTable(CategoryLocal::$tabel_name . $local->slug);
                $model->create([
                    "name" => fake()->text(rand(5, 15)),
                    "category_id" => $c->id,
                    "description" => fake()->text(rand(10, 35)),
                ]);
            }

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
