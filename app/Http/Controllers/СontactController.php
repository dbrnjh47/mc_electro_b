<?php

namespace App\Http\Controllers;

use App\Http\Services\Models\PointModelServices;

class СontactController extends Controller
{
    public function all()
    {
        $points = (new PointModelServices)->get();
        // dd($points);
        return view('sample.main.pages.сontact.index', ['title' => "Контакты", 'description' => ""]);
    }

    public function show()
    {
        return view('sample.main.pages.сontact.one', ['title' => "Точка", 'description' => ""]);
    }
}
