<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Controllers\Controller;
use App\Models\Traits\Filterable;
use App\Models\Traits\Standardable;

class Banner extends Model
{
    /** @use HasFactory<\Database\Factories\BannerFactory> */
    use HasFactory;
    use Filterable;
    use Standardable;

    const PATH = "/assets/banners/";
    protected $appends = ['img_path'];
    public function getIMGPathAttribute()
    {
        return ($this->img ? Controller::photoAccessor($this->img, self::PATH) : null);
    }
}
