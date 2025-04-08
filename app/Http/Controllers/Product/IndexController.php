<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function show()
    {
        return view('sample.main.pages.product.index', ['title' => "Продукт", 'description' => ""]);
    }
}
