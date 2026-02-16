<?php

namespace App\Models\Product;

use App\Models\Point\Point;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPoint extends Model
{
    /** @use HasFactory<\Database\Factories\Product\ProductPointFactory> */
    use HasFactory;
    protected $guarded = false;

    public function point()
    {
        return $this->hasMany(Point::class, 'id', 'point_id');
    }
}
