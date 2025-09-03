<?php
//off
namespace App\Http\Services\Models;

use App\Models\Locale;

class LocaleModelService extends ControllerModelService
{
    public $select_list;
    public function __construct($select_list = null)
    {
        $this->select_list = $select_list;
        $this->model = $this->defult();
    }

    public function defult()
    {
        $model = Locale::query();
        $model = LocaleModelService::whereOn($model);
        if($this->select_list)
        {
            $model->select($this->select_list);
        }
        return $model;
    }
    public static function whereOn($model)
    {
        return $model->where("is_configured", 1);
    }

    public function firstBySlug($slug)
    {
        return $this->model->where("slug", $slug)->first();
    }

    public function get()
    {
        return $this->model->get();
    }
}
