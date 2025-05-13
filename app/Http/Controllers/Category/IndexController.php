<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function all()
    {

       $i = Category::find(4);
    //    dd($i->children());
    //    dd($i->parents());

        return view('sample.main.pages.category.all.index', ['title' => "Категории", 'description' => ""]);
    }

    public function show(Request $request)
    {
        dd($request->slugs);
        return view('sample.main.pages.category.first.index', ['title' => "Категорию", 'description' => ""]);
    }
}
