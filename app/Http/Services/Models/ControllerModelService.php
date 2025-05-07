<?php

namespace App\Http\Services\Models;

class ControllerModelService
{
    public $model = null;
    public function where($key, $value)
    {
        $this->model->where($key, $value);
    }

    public function getModel()
    {
        return $this->model;
    }
}
