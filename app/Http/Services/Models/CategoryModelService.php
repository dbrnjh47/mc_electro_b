<?php

namespace App\Http\Services\Models;

use App\Models\Category\Category;

class CategoryModelService extends ControllerModelService
{
    public $select_list;
    public function __construct($select_list = null)
    {
        $this->select_list = $select_list;
        $this->model = $this->defult();
        $this->model->with("locale")->whereHas("locale");
    }

    public function defult()
    {
        $model = Category::query();
        if($this->select_list)
        {
            $model->select($this->select_list);
        }
        $model = CategoryModelService::whereOn($model);

        return $model;
    }

    public function firstBySlug($slug)
    {
        return $this->model->where("slug", $slug)->first();
    }

    public static function whereOn($model)
    {
        return $model;
    }

    public function getIn($ids)
    {
        return $this->model
            ->whereIn("id", $ids)
            ->get();
    }
}
