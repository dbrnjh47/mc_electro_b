<?php

namespace App\Models\Point;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    /** @use HasFactory<\Database\Factories\PointFactory> */
    use HasFactory;

    public function locale()
    {
        return $this->hasOne(PointLocale::class, 'point_id', 'id');
    }
}
