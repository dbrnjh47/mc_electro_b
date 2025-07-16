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
    const DEFULT_PREVIEW_PATH = "/temple/images/contact/default.jpg";
    protected $guarded = false;
    protected $appends = ['img_path'];

    public function getIMGPathAttribute()
    {
        return ($this->img ? Controller::photoAccessor($this->img, self::PATH) : null);
    }
}
