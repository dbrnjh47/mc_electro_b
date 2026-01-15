<?php

namespace App\Models\Banner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Controllers\Controller;
use App\Models\City\City;
use App\Models\Traits\Filterable;
use App\Models\Traits\Standardable;

class Banner extends Model
{
    /** @use HasFactory<\Database\Factories\BannerFactory> */
    use HasFactory;
    use Filterable;
    use Standardable;
    protected $guarded = false;
    const MAX_WIDTH = 230;
    const MAX_HEIGHT = 550;
    const PATH = "/assets/banners/";
    const TEST_FILES = ["1.webp", "2.webp", "3.webp"];
    protected $appends = ['img_path'];
    public function getIMGPathAttribute()
    {
        return ($this->img ? Controller::photoAccessor($this->img, self::PATH) : null);
    }

    public function cities()
    {
        return $this->belongsToMany(
            City::class,          // Целевая модель
            (new BannerCity())->getTable(),     // Промежуточная таблица
        );
    }
}
