<?php

namespace App\Models\Point;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Propaganistas\LaravelPhone\PhoneNumber;

class PointPhone extends Model
{
    /** @use HasFactory<\Database\Factories\Point\PointPhoneFactory> */
    use HasFactory;

    protected function phone(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => (object)[
                "number" => $value,
                "text" => (new PhoneNumber($value))->formatInternational()
            ],
            // set: fn ($value) => $this->setPhotoAccessor($value),
        );
    }
}
