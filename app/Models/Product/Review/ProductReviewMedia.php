<?php

namespace App\Models\Product\Review;

use App\Http\Controllers\Controller;
use App\Http\Services\Media\MediaService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReviewMedia extends Model
{
    /** @use HasFactory<\Database\Factories\Product\Review\ProductReviewMediaFactory> */
    use HasFactory;

    const PATH = "/assets/product/review/";
    const TEST_FILES = ["test.mp4", "test.webp"];
    protected $appends = ['path', 'miniature'];

    public function getPathAttribute()
    {
        return Controller::photoAccessor($this->name, self::PATH."media/");
    }

    public function is_video()
    {
        return (new MediaService)->is_video($this->name);
    }

    public function getMiniatureAttribute()
    {
        if($this->is_video())
        {
            $p = $this->name;
            $p = preg_replace('/\.[^.]+$/', '', $p);

            return Controller::photoAccessor($p.".webp", self::PATH."miniature/");
        } else {
            return Controller::photoAccessor($this->name, self::PATH."miniature/");
        }

    }
}
