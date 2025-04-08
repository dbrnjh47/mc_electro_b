<?php

namespace App\Http\Controllers;

class СontactController extends Controller
{
    public function all()
    {
        return view('sample.main.pages.сontact.index', ['title' => "Контакты", 'description' => ""]);
    }

    public function show()
    {
        return view('sample.main.pages.сontact.one', ['title' => "Точка", 'description' => ""]);
    }
}
