<?php

namespace App\Models\Product;

use App\Models\Category\Subcategory;
use App\Models\Property\Property;
use App\Models\Property\PropertyCategory;
use App\Models\Property\PropertyValue;
use App\Observers\Product\PropertyObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([PropertyObserver::class])]
class ProductProperty extends Model
{
    /** @use HasFactory<\Database\Factories\Product\ProductPropertyFactory> */
    use HasFactory;

    public function product()
    {
        return $this->hasOne(Product::class, "id", "product_id");
    }

    public function property()
    {
        return $this->hasOne(Property::class, "id", "property_id");
    }

    public function value()
    {
        return $this->hasOne(PropertyValue::class, "id", "property_value_id");
    }

    public function createPropertyCategory()
    {
        // dump($productProperty);
        $category_id_list = $this->product->categories->pluck("category_id");
        // dump($category_id_list);
        $all_category_id_list = Subcategory::whereIn("category_child_id", $category_id_list)->pluck("category_id");
        $all_category_id_list = $all_category_id_list->merge($category_id_list);
        // dump($all_category_id_list);

        $data = [];
        foreach ($all_category_id_list as $category_id) {
            $data[] = [
                'property_id' => $this->property_id,
                'category_id' => $category_id,
            ];
        }

        PropertyCategory::upsert(
            $data,
            ['property_id', 'category_id'], // Уникальные ключи
            [] // Поля для обновления (пусто = не обновлять)
        );
    }
}
