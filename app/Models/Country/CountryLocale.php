<?php

namespace App\Models\Country;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryLocale extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory;

    protected $guarded = false;
    public static $tabel_name = "countries_";
    public function __construct(array $attributes = [], $key = null)
    {
        parent::__construct($attributes);
        if(!$key){$key = app()->getLocale();}
        $this->setTable(CountryLocale::$tabel_name.$key);
    }
}
