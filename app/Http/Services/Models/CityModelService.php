<?php

namespace App\Http\Services\Models;

use App\Models\City\City;

class CityModelService extends ControllerModelService
{
    public $select_list;
    public function __construct($select_list = null)
    {
        $this->select_list = $select_list;
        $this->model = $this->defult();
    }

    public function defult()
    {
        $model = City::query();

        if($this->select_list)
        {
            $model->select($this->select_list);
        }
        return $model;
    }

    public function first($city)
    {
        return $this->model->where("name", $city)->first();
    }
}
