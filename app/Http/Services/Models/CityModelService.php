<?php

namespace App\Http\Services\Models;

use App\Models\City\City;

class CityModelService
{
    public $select_list;
    public function __construct($select_list = null)
    {
        $this->select_list = $select_list;
    }

    public function defult()
    {
        $model = City::query()->with(["locale" => function($query) {
            $query->select('name', 'city_id');
        }])->whereHas("locale");
        if($this->select_list)
        {
            $model->select($this->select_list);
        }
        return $model;
    }
}
