<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use App\Observers\Product\CategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([CategoryObserver::class])]
class ProductCategory extends Model
{
    /** @use HasFactory<\Database\Factories\Product\ProductCategoryFactory> */
    use HasFactory;
    protected $fillable = [
        'product_id',
        'category_id',
    ];
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
