<?php

namespace App\Http\Services\Models;

use App\Models\City\City;

class CityModelService extends ControllerModelService
{
    public $select_list, $pagination = 10;
    public function __construct($select_list = null, public $on_check = 1)
    {
        $this->select_list = $select_list;
        $this->model = $this->defult();
    }

    public function defult()
    {
        $this->model = City::query();

        if($this->select_list)
        {
            $this->model->select($this->select_list);
        }

        if($this->on_check)
        {
            $this->model = self::whereOn($this->model);
        }

        return $this->model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public static function whereOn($model)
    {
        return $model->where("is_on", 1);
    }

    public function first($city)
    {
        return $this->model->where("name", $city)->first();
    }

    public function firstBySlug($slug)
    {
        return $this->model->where("slug", $slug)->first();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function paginate($page = null)
    {
        if($page)
        {
            return $this->model->paginate($this->pagination, page:$page);
        }
        return $this->model->paginate($this->pagination);
    }
}
