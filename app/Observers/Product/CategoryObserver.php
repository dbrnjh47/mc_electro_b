<?php

namespace App\Observers\Product;

use App\Models\Category\Subcategory;
use App\Models\Product\ProductCategory;
use App\Models\Property\PropertyCategory;

class CategoryObserver
{
    public function created(ProductCategory $productCategory): void
    {
        $category_ids = Subcategory::where("category_child_id", $productCategory->category_id)->pluck("category_id");
        $category_ids->push($productCategory->category_id);
        dump($category_ids);

        // Распростанение товара на родительские категории
        $data = [];
        foreach ($category_ids as $category_id) {
            $data[] = [
                'product_id' => $productCategory->product_id,
                'category_id' => $category_id,
            ];
        }

        ProductCategory::upsert(
            $data,
            ['product_id', 'category_id'], // Уникальные ключи
            [] // Поля для обновления (пусто = не обновлять)
        );

        // создание PropertyCategory
        $property_ids = $productCategory->product->productProperties->pluck("property_id");
        dump($property_ids);

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
