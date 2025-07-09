<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\Controller;

class ProductMedia extends Model
{
    /** @use HasFactory<\Database\Factories\Product\ProductPhotoFactory> */
    use HasFactory;

    const PATH = "/assets/product/";
    const DEFAULT = "default.jpg";
    protected $guarded = false;
    protected $appends = ['path', 'miniature'];

    public function getPathAttribute()
    {
        return Controller::photoAccessor($this->name, self::PATH."photo/");
    }

    public function getMiniatureAttribute()
    {
        return Controller::photoAccessor($this->name, self::PATH."miniature/");
    }

    public static function getDefult()
    {
        return (object)[
            "path" => Controller::photoAccessor(self::DEFAULT, self::PATH."photo/"),
            "miniature" => Controller::photoAccessor(self::DEFAULT, self::PATH."miniature/")
        ];
    }
}
