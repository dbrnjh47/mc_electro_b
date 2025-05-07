<?php

namespace App\Http\Services\Models;

use App\Models\Currency;

class CurrencyModelService extends ControllerModelService
{
    public $defult_abbreviation = "RUB";
    public $select_list;
    public function __construct($select_list = null)
    {
        $this->select_list = $select_list;
        $this->model = $this->defult();
    }

    public function defult()
    {
        $model = Currency::query();
        $model = CurrencyModelService::whereOn($model);
        if($this->select_list)
        {
            $model->select($this->select_list);
        }
        return $model;
    }

    public static function whereOn($model)
    {
        return $model->where("is_on", 1);
    }
    public function all()
    {
        return $this->model->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function defultUser()
    {
        return $this->model->where("abbreviation", $this->defult_abbreviation)->first();
    }
}
