<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityLocale extends Model
{
    use HasFactory;

    protected $guarded = false;
    public static $tabel_name = "city_";
    public function __construct(array $attributes = [], $key = null)
    {
        $key = "ru";
        parent::__construct($attributes);
        if(!$key){$key = app()->getLocale();}
        $this->setTable(CityLocale::$tabel_name.$key);
    }
}
