<?php

namespace App\Models\City;

use App\Models\Point\Point;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Traits\Filterable;
use App\Models\Traits\Standardable;

// use Illuminate\Database\Eloquent\Attributes\ObservedBy;
// use App\Observers\CityObserver;

// #[ObservedBy([CityObserver::class])]
class City extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory;
    use Sluggable;
    use Filterable;
    use Standardable;

    protected $guarded = false;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => false, // обновлять slug при изменении title
                'unique' => true, // гарантировать уникальность
                'separator' => '-', // разделитель
                // 'maxLength' => 100, // максимальная длина
                // 'method' => function ($string, $separator) {
                //     return Str::slug($string, $separator);
                // }
            ]
        ];
    }

    public function points()
    {
        return $this->hasMany(Point::class, 'city_id', 'id');
    }
}
