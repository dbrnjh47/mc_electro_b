<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Controllers\Controller;
class Currency extends Model
{
    /** @use HasFactory<\Database\Factories\CurrencyFactory> */
    use HasFactory;

    const PATH = "/assets/banners/";
    protected $appends = ['img_path'];
    public function getIMGPathAttribute()
    {
        return ($this->img ? Controller::photoAccessor($this->img, self::PATH) : null);
    }
}
