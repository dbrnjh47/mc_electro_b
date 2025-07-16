<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class Locale extends Model
{
    /** @use HasFactory<\Database\Factories\LocaleFactory> */
    use HasFactory;
    const PATH = "/temple/images/locales/icon/";
    protected $appends = ['icon_path'];
    public function getIconPathAttribute()
    {
        return ($this->icon ? Controller::photoAccessor($this->icon, self::PATH) : null);
    }

    // {{$locale->getUrl()}}
    public function getUrl()
    {
        $path = request()->path();
        $path = Str::start($path, "{$this->slug}/");
        $url = url($path);
        return $url;
    }
}
