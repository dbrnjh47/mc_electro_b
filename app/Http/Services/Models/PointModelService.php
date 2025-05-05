<?php

namespace App\Http\Services\Models;

use App\Models\Point\Point;

class PointModelService
{
    public $pagination = 2, $search;
    public function __construct($search = null)
    {
        $this->search = $search;
    }

    public function defult()
    {
        $points = Point::where("is_on", 1)
            ->with('links.category')
            ->with('phones')
            ->with('photos')
            ->with('locale')
            ->whereHas('locale', function ($q) {
                if($this->search)
                {
                    $q = $q->where("title", 'like', "%{$this->search}%")->orWhere("address", 'like', "%{$this->search}%");
                }
            });

        return $points;
    }
    public function get()
    {
        return $this->defult()->get();
    }

    public function pagination()
    {
        return $this->defult()->paginate($this->pagination);
    }

    public function find($id)
    {
        return $this->defult()->findOrFail($id);
    }
}
