<?php

namespace App\Http\Services\Models;

use App\Models\Point\Point;

class PointModelService
{
    public function get()
    {
        return Point::where("is_on", 1)->with('locale')->whereHas('locale')->get();
    }
}
