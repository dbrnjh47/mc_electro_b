<?php

namespace App\Models\Product\Document;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDocument extends Model
{
    /** @use HasFactory<\Database\Factories\Product\Document\ProductDocumentFactory> */
    use HasFactory;
    protected $guarded = false;
    protected $appends = ['path'];
    const TEST_FILES = ["test.pdf"];
    const PATH = "/assets/product/document/";

    public function getPathAttribute()
    {
        return Controller::photoAccessor($this->name, self::PATH);
    }
}
