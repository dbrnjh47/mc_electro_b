<?php

namespace Database\Seeders\Property;

use App\Models\Category\Subcategory;
use App\Models\Property\PropertyCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($parameters = []): void
    {
        $parent_ids = $this->getParentCategoryIds($parameters["category_ids"]);

        $category_ids = $parent_ids->merge($parameters["category_ids"])->unique()->values();
        unset($parent_ids);
        $data = [];
        foreach ($category_ids as $category_id) {
            $data[] = [
                'property_id' => $parameters["property_id"],
                'category_id' => $category_id,
            ];
        }

        PropertyCategory::upsert(
            $data,
            ['property_id', 'category_id'], // Уникальные ключи
            [] // Поля для обновления (пусто = не обновлять)
        );
    }

    private function getParentCategoryIds($category_ids)
    {
        $parent_ids = DB::table(DB::raw("
            (WITH RECURSIVE CategoryPath AS (
                SELECT
                    category_parent_id,
                    category_child_id
                FROM
                    " . (new Subcategory())->getTable() . "
                LEFT JOIN
                    categories ON " . (new Subcategory())->getTable() . ".category_parent_id = categories.id
                WHERE
                    category_child_id IN (" . $category_ids->implode(', ') . ")
                UNION ALL
                SELECT
                    c.category_parent_id,
                    c.category_child_id
                FROM
                    " . (new Subcategory())->getTable() . " AS c
                INNER JOIN
                    CategoryPath cp ON c.category_child_id = cp.category_parent_id
                LEFT JOIN
                    categories ON c.category_parent_id = categories.id
            )
            SELECT * FROM CategoryPath as cp) as subquery
        "))->get();

        $parent_ids = $parent_ids->flatMap(function ($item) {
            return [$item->category_parent_id, $item->category_child_id];
        })->unique()->values();
        return $parent_ids;
    }
}
