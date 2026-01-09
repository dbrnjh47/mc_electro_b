<?php

namespace App\Http\Services\Product;

use App\Models\Category\Subcategory;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductProperty;
use App\Models\Property\PropertyCategory;
use Illuminate\Support\Facades\Log;
use Throwable;

class ProductCategoryService
{
    public $delete_category_list = [];
    public $create_category_list = [];
    public $limit = 50;
    // удаление старых категорий и создание новых в ProductCategory и ProductProperty
    public function update($category_id, $category_parent_id, $old_category_parent_id = null)
    {
        // dump([$category_id, $category_parent_id, $old_category_parent_id]);
        if ($old_category_parent_id && $category_parent_id != $old_category_parent_id) {
            // dump("old_category_parent_id", $old_category_parent_id);
            $this->delete_category_list = Subcategory::where("category_child_id", $old_category_parent_id)->pluck("category_id")->toArray();
            $this->delete_category_list[] = $old_category_parent_id;
            // dump(["delete_category_list", $this->delete_category_list]);
        }

        if ($category_parent_id) {
            $this->create_category_list = Subcategory::where("category_child_id", $category_parent_id)->pluck("category_id")->toArray();
            $this->create_category_list[] = $category_parent_id;
            // dump(["create_category_list", $this->create_category_list]);
        }

        //
        $product_id_list_count = ProductCategory::where('category_id', $category_id)
            ->count();
        if(!$product_id_list_count){return;}
        for ($i = 0; $i < $product_id_list_count; $i = $i + $this->limit) {
            try {
                $product_ids = ProductCategory::where('category_id', $category_id)
                    ->offset($i)
                    ->limit($this->limit)
                    ->pluck('product_id');

                if (empty($product_ids)) {
                    return;
                }

                $property_ids = ProductProperty::whereHas('product.categories', function ($query) use ($category_id) {
                    $query->where('category_id', $category_id);
                })
                    ->whereIn("product_id", $product_ids)
                    ->distinct()
                    ->pluck('property_id');
                // dump($property_ids);

                //

                // удаляет старые категории у товаров
                if (!empty($this->delete_category_list)) {
                    ProductCategory::whereIn('category_id', $this->delete_category_list)
                        ->whereIn("product_id", $product_ids)
                        ->delete();
                }
                // удаляет старые категории у характеристик
                if (!empty($this->delete_category_list) && !empty($property_ids)) {
                    PropertyCategory::whereIn('category_id', $this->delete_category_list)
                        ->whereIn("property_id", $property_ids)
                        ->delete();
                }

                // добавим новые категории к товарам

                if (!empty($this->create_category_list)) {
                    $data = [];
                    foreach ($this->create_category_list as $c_id) {
                        foreach ($product_ids as $product_id) {
                            $data[] = [
                                'category_id' => $c_id,
                                'product_id' => $product_id,
                            ];
                        }
                    }

                    ProductCategory::insertOrIgnore($data);
                    unset($data);
                }

                if (!empty($this->create_category_list) && !empty($property_ids)) {
                    // добавим новые категории к характеристикам
                    $data = [];
                    foreach ($this->create_category_list as $c_id) {
                        foreach ($property_ids as $property_id) {
                            $data[] = [
                                'category_id' => $c_id,
                                'property_id' => $property_id,
                            ];
                        }
                    }

                    PropertyCategory::insertOrIgnore(
                        $data
                    );
                    unset($data);
                }
            } catch (Throwable $e) {
                // dump($e->getMessage());
                Log::debug("ProductCategoryService");
                Log::debug($e->getMessage());
            }
        }
        // dd([$category_id, $category_parent_id, $old_category_parent_id]);
    }
}
