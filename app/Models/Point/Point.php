<?php

namespace App\Models\Point;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    /** @use HasFactory<\Database\Factories\PointFactory> */
    use HasFactory;

    protected $guarded = false;
    const DEFULT_PREVIEW_PATH = "/temple/images/contact/default.jpg";

    public function locale()
    {
        return $this->hasOne(PointLocale::class, 'point_id', 'id');
    }

    public function photos()
    {
        return $this->hasMany(PointPhoto::class, 'point_id', 'id');
    }

    public function phones()
    {
        return $this->hasMany(PointPhone::class, 'point_id', 'id');
    }
}
