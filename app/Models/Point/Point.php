<?php

namespace App\Models\Point;

use App\Models\City\City;
use App\Models\Point\Link\PointLink;
use App\Models\Product\Product;
use App\Models\Product\ProductPoint;
use App\Models\Traits\Filterable;
use App\Models\Traits\Standardable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    /** @use HasFactory<\Database\Factories\PointFactory> */
    use HasFactory;
    use Filterable;
    use Standardable;

    protected $guarded = false;

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function photos()
    {
        return $this->hasMany(PointPhoto::class, 'point_id', 'id');
    }

    public function phones()
    {
        return $this->hasMany(PointPhone::class, 'point_id', 'id');
    }

    public function links()
    {
        return $this->hasMany(PointLink::class, 'point_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,          // Целевая модель
            (new ProductPoint())->getTable(),     // Промежуточная таблица
        )->withPivot('count')
        ->orderByPivot('updated_at', 'desc');
    }

    public function product_point()
    {
        return $this->hasOne(ProductPoint::class, 'point_id', 'id');
    }
}
