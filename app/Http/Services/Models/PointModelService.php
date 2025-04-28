<?php

namespace App\Http\Services\Models;

use App\Models\Point\Point;

class PointModelService
{
    public $pagination = 2;
    public function defult()
    {
        return Point::select((new Point())->getTable().'.*')
        ->where("is_on", 1)
        ->with('links.category')
        ->with('phones')
        ->with('photos')
        ->with('locale')
        ->whereHas('locale');
    }
    public function get()
    {
        return $this->defult()->get();
    }

    public function pagination()
    {
        return $this->defult()
            ->join("points_ru as locale_ru", 'points.id', '=', 'locale_ru.point_id')
            ->where('locale_ru.title', 'LIKE', "%тес2т%")
            ->paginate($this->pagination);
    }

    public function find($id)
    {
        return $this->defult()->findOrFail($id);
    }
}
