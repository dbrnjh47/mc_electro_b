<?php

namespace App\Models\Point;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Controllers\Controller;

class PointPhoto extends Model
{
    /** @use HasFactory<\Database\Factories\Point\PointPhotoFactory> */
    use HasFactory;

    const PATH = "/assets/contacts/photo/";
    protected $guarded = false;

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($value ? Controller::photoAccessor($value, self::PATH) : null),
            // set: fn ($value) => $this->setPhotoAccessor($value),
        );
    }
}
