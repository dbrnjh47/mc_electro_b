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
    protected $appends = ['path_preview'];
    public function products()
    {
        return $this->hasMany(Product::class, 'company_id', 'id');
    }
    public function locale()
    {
        return $this->hasOne(CompanyLocale::class, 'company_id', 'id');
    }

    public function getPathPreviewAttribute()
    {
        $name = ($this->preview ? $this->preview : self::DEFAULT);
        return Controller::photoAccessor($name, self::PATH_PREVIEW);
    }
}
