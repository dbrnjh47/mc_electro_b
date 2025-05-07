<?php

namespace App\Http\Services\Models;

use App\Models\Banner;

class BannerModelService extends ControllerModelService
{
    public $select_list;
    public function __construct($select_list = null)
    {
        $this->select_list = $select_list;
        $this->model = $this->defult();
    }

    public function defult()
    {
        $model = Banner::query();
        if($this->select_list)
        {
            $model->select($this->select_list);
        }
        $model = BannerModelService::whereOn($model);

        return $model;
    }

    public static function whereOn($model)
    {
        return $model->where("is_on", 1)
            ->where("locale_id", app('user_local')->id);
    }

    public function getByKey($key)
    {
        return $this->model
            ->where("key", $key)
            ->get();
    }
}
