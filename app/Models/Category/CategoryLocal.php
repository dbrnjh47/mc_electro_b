<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryLocal extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $guarded = false;
    public static $tabel_name = "categories_";
    public function __construct(array $attributes = [], $key = null)
    {
        parent::__construct($attributes);
        if(!$key){$key = app()->getLocale();}
        $this->setTable(CategoryLocal::$tabel_name.$key);
    }
}
