<?php

namespace App\Http\Services\Models;

use App\Models\Banner;

class BannerModelServices
{
    public function getByKey($key)
    {
        return Banner::where("key", $key)
            ->where("is_on", 1)
            ->where("locale_id", app('user_local')->id)
            ->get();
    }
}
