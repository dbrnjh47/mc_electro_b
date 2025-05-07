<?php

namespace App\Http\Services\Models;

use App\Models\Banner;

class BannerModelService extends ControllerModelService
{
    public function __construct()
    {
        $this->model = $this->defult();
    }

    public function defult()
    {
        $model = Banner::query();
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
