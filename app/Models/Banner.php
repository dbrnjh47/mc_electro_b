<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Controllers\Controller;

class Banner extends Model
{
    /** @use HasFactory<\Database\Factories\BannerFactory> */
    use HasFactory;

    const PATH = "/assets/banners/";

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($value ? Controller::photoAccessor($value, self::PATH) : null),
            // set: fn ($value) => $this->setPhotoAccessor($value),
        );
    }
}
