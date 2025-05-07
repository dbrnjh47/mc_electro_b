<?php

namespace App\Http\Services\Models;

use App\Models\Point\Point;

class PointModelService extends ControllerModelService
{
    public $pagination = 9, $search;
    public function __construct($search = null)
    {
        $this->search = $search;
        $this->model = $this->defult();
    }

    public function defult()
    {
        $model = Point::query();
        $model = PointModelService::whereOn($model);
        $model->with('links.category')
            ->with('phones')
            ->with('photos')
            ->with('locale')
            ->whereHas('locale', function ($q) {
                if($this->search)
                {
                    $q = $q->where("title", 'like', "%{$this->search}%")->orWhere("address", 'like', "%{$this->search}%");
                }
            });

        return $model;
    }

    public static function whereOn($model)
    {
        return $model->where("is_on", 1);
    }

    public function get()
    {
        return $this->model->get();
    }

    public function pagination()
    {
        return $this->model->paginate($this->pagination);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
}
