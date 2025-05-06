<?php

namespace App\Http\Services\Models;

use App\Models\Country\Country;

class CountryModelService
{
    public $select_list;
    public function __construct($select_list = null)
    {
        $this->select_list = $select_list;
    }

    public function defult()
    {
        $model = Country::query();
        if($this->select_list)
        {
            $model->select($this->select_list);
        }
        return $model;
    }

    public function getIn($key, $data)
    {
        return $this->defult()->whereIn($key, $data)
            ->get();
    }
}
