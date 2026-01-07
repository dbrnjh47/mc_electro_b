<?php

namespace App\Models\Company;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\Company\CompanyFactory> */
    use HasFactory;
    const PATH_PREVIEW = "/assets/companies/logo/";
    const DEFAULT = "default.jpg";
    const TEST_FILES = ["default.jpg", "1.svg", "2.svg", "3.svg", "4.svg", "5.svg", "6.svg", "7.svg", "8.svg", "9.svg", "10.svg"];
    protected $appends = ['path_preview'];
    protected $guarded = false;
    public function products()
    {
        return $this->hasMany(Product::class, 'company_id', 'id');
    }

    public function getPathPreviewAttribute()
    {
        $name = ($this->preview ? $this->preview : self::DEFAULT);
        return Controller::photoAccessor($name, self::PATH_PREVIEW);
    }
}
