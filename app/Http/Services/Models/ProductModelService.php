<?php

namespace App\Http\Services\Models;

use App\Models\Product\Product;

class ProductModelService extends ControllerModelService
{
    public $pagination = 9, $slug, $select_list;
    public function __construct($slug = null, $select_list = null)
    {
        $this->slug = $slug;
        $this->select_list = $select_list;
        $this->model = $this->defult();
    }

    public function defult()
    {
        $model = Product::query();

        if($this->select_list)
        {
            $model->select($this->select_list);
        }

        $model = ProductModelService::whereOn($model);

        if($this->slug)
        {
            $model->where("slug", $this->slug);
        }

        $model->with('locale')
            ->whereHas('locale', function ($q) {
                $q = $q->where("locale_id", app()->user_local->id);
            });

        return $model;
    }

    public static function whereOn($model)
    {
        return $model;
    }

    public function get()
    {
        return $this->model->get();
    }

    public function pagination($page = null)
    {
        if($page)
        {
            return $this->model->paginate($this->pagination, page:$page);
        }
        return $this->model->paginate($this->pagination);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
}
