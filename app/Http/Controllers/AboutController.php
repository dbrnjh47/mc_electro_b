<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function show()
    {
        return view('sample.main.pages.about', ['title' => "О нас", 'description' => ""]);
    }
}
