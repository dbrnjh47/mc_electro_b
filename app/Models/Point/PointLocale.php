<?php

namespace App\Models\Point;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointLocale extends Model
{
    use HasFactory;
    public static $tabel_name = "points_";
    public function __construct(array $attributes = [], $key = null)
    {
        parent::__construct($attributes);
        if(!$key){$key = app()->getLocale();}
        $this->setTable(PointLocale::$tabel_name.$key);
    }
}
