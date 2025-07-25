<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    /** @use HasFactory<\Database\Factories\Product\ProductCategoryFactory> */
    use HasFactory;

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
