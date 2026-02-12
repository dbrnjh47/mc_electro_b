<?php

namespace App\Models\Product;

use App\Models\Cart\CartProduct;
use App\Models\Company\Company;
use App\Models\Product\Document\ProductDocument;
use App\Models\Product\Label\ProductLabel;
use App\Models\Product\Label\ProductLabelOption;
use App\Models\Product\Review\ProductReview;
use App\Models\Property\Property;
use App\Models\Property\PropertyValue;
use App\Models\Traits\Filterable;
use App\Models\Traits\Standardable;
use App\Models\User\Wishlist\WishlistProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\Product\ProductFactory> */
    use HasFactory;
    use Filterable;
    use Standardable;

    protected $guarded = false;
    public function points()
    {
        return $this->hasMany(ProductPoint::class, 'product_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(ProductCategory::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(ProductCategory::class, 'product_id', 'id');
    }

    public function medias()
    {
        return $this->hasMany(ProductMedia::class, 'product_id', 'id');
    }

    public function documents()
    {
        return $this->hasMany(ProductDocument::class, 'product_id', 'id');
    }

    public function labels()
    {
        return $this->belongsToMany(
            ProductLabelOption::class,          // Целевая модель
            (new ProductLabel())->getTable(),     // Промежуточная таблица
        );
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id')->where("is_on", 1);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id')->where("is_on", 1);
    }

    public function wishlist_products()
    {
        return $this->hasMany(WishlistProduct::class, 'product_id', 'id');
    }

    public function cart_products()
    {
        return $this->hasMany(CartProduct::class, 'product_id', 'id');
    }

    public function productProperties()
    {
        return $this->hasMany(ProductProperty::class, 'product_id', 'id');
    }

    public function getPreview()
    {
        if ($this->medias->isEmpty()) {
            $defult_media = \App\Models\Product\ProductMedia::getDefult();
            return $defult_media->path;
        } else {
            return $this->medias[0]->miniature;
        }
    }

    public function getPriceText($price = 0)
    {
        if(!$price)
        {
            $price = $this->mrp;
        }

        return number_format($price, 2, ',', ' ')." руб.";
    }
}
