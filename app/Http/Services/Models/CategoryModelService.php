<?php

namespace App\Http\Services\Models;

use App\Models\Category\Category;

class CategoryModelService extends ControllerModelService
{
    public $select_list, $pagination = 9, $on_check;
    public function __construct($select_list = null, $model = null, $on_check = 1)
    {
        $this->on_check = $on_check;
        if($model)
        {
            $this->model = $model;
        } else {
            $this->select_list = $select_list;
            $this->model = $this->defult();
        }
    }

    public function defult()
    {
        $model = Category::query();
        if($this->select_list)
        {
            $model->select($this->select_list);
        }
        if($this->on_check)
        {
            $model = CategoryModelService::whereOn($model);
        }

        return $model;
    }

    public function pagination($page = null)
    {
        if($page)
        {
            return $this->model->paginate($this->pagination, page:$page);
        }
        return $this->model->paginate($this->pagination);
    }

    public function firstBySlug($slug)
    {
        return $this->model->where("slug", $slug)->first();
    }

    public static function whereOn($model)
    {
        return $model->where("is_on", 1);
    }

    public function getIn($ids)
    {
        return $this->model
            ->whereIn("id", $ids)
            ->get();
    }
}
