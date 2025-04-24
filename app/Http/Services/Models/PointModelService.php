<?php

namespace App\Http\Services\Models;

use App\Models\Point\Point;

class PointModelService
{
    public $pagination = 1;
    public function defult()
    {
        return Point::where("is_on", 1)->with('links.category')->with('phones')->with('photos')->with('locale')->whereHas('locale');
    }
    public function get()
    {
        return $this->defult()->get();
    }

    public function pagination()
    {
        return $this->defult()->paginate($this->pagination);
    }
}
