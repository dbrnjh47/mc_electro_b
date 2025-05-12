<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;

class IndexController extends Controller
{
    public function all()
    {
       Category::first()->parents();
        return view('sample.main.pages.category.all.index', ['title' => "Категории", 'description' => ""]);
    }

    public function show()
    {
        return view('sample.main.pages.category.first.index', ['title' => "Категорию", 'description' => ""]);
    }
}
