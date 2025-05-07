<?php

namespace App\Models\City;

use App\Models\Point\Point;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory;

    protected $guarded = false;

    public function locale()
    {
        return $this->hasOne(CityLocale::class, 'city_id', 'id');
    }

    public function points()
    {
        return $this->hasMany(Point::class, 'city_id', 'id');
    }
}
