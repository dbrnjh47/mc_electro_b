<?php

namespace App\Observers\Product;

use App\Models\Category\Subcategory;
use App\Models\Product\ProductCategory;
use App\Models\Property\PropertyCategory;

class CategoryObserver
{
    public function created(ProductCategory $productCategory): void
    {
        $property_ids = $productCategory->product->productProperties->pluck("property_id");
        dump($property_ids);
        $category_ids = Subcategory::where("category_child_id", $productCategory->category_id)->pluck("category_id");
        $category_ids->push($productCategory->category_id);
        dump($category_ids);

        $data = [];
        foreach ($category_ids as $category_id) {
            foreach($property_ids as $property_id)
            {
                $data[] = [
                    'property_id' => $property_id,
                    'category_id' => $category_id,
                ];
            }
        }

        PropertyCategory::upsert(
            $data,
            ['property_id', 'category_id'], // Уникальные ключи
            [] // Поля для обновления (пусто = не обновлять)
        );
    }
}
