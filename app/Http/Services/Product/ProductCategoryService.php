<?php

namespace App\Http\Services\Product;

use App\Models\Category\Subcategory;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductProperty;
use App\Models\Property\PropertyCategory;

class ProductCategoryService
{
    // в теории очень тяжелая, переделать на чанки
    // удаление старых категорий и создание новых в ProductCategory и ProductProperty
    public function update($category_id, $category_parent_id, $old_category_parent_id = null)
    {
        $product_ids = ProductCategory::where('category_id', $category_id)
            ->pluck('product_id');
        if (empty($product_ids)) {
            return;
        }
        $property_ids = ProductProperty::whereHas('product.categories', function ($query) use ($category_id) {
            $query->where('category_id', $category_id);
        })
            ->distinct()
            ->pluck('property_id');
        // dump($property_ids);
        // удаляет старые категории у товаров
        if ($old_category_parent_id && $category_parent_id != $old_category_parent_id) {
            // dump("old_category_parent_id", $old_category_parent_id);
            $category_ids = Subcategory::where("category_child_id", $old_category_parent_id)->pluck("category_id")->toArray();
            $category_ids[] = $old_category_parent_id;

            // dump(["del category_ids", $category_ids]);
            if (!empty($category_ids)) {
                ProductCategory::whereIn('category_id', $category_ids)
                    ->whereIn("product_id", $product_ids)
                    ->delete();

                // удаляет старые категории у характеристик
                if (!empty($property_ids)) {
                    PropertyCategory::whereIn('category_id', $category_ids)
                        ->whereIn("property_id", $property_ids)
                        ->delete();
                }
            }
        }

        // добавим новые категории к товарам
        if ($category_parent_id) {
            $category_ids = Subcategory::where("category_child_id", $category_parent_id)->pluck("category_id")->toArray();
            $category_ids[] = $category_parent_id;

            $data = [];
            foreach ($category_ids as $category_id) {
                foreach ($product_ids as $product_id) {
                    $data[] = [
                        'category_id' => $category_id,
                        'product_id' => $product_id,
                    ];
                }
            }

            ProductCategory::upsert(
                $data,
                ['category_id', 'product_id'], // Уникальные ключи
                [] // Поля для обновления (пусто = не обновлять)
            );
            unset($data);

            //
            // добавим новые категории к характеристикам
            if (!empty($property_ids)) {
                $data = [];
                foreach ($category_ids as $category_id) {
                    foreach ($property_ids as $property_id) {
                        $data[] = [
                            'category_id' => $category_id,
                            'property_id' => $property_id,
                        ];
                    }
                }

                PropertyCategory::upsert(
                    $data,
                    ['category_id', 'property_id'], // Уникальные ключи
                    [] // Поля для обновления (пусто = не обновлять)
                );
            }
        }

        // dd([$category_id, $category_parent_id, $old_category_parent_id]);
    }
}
