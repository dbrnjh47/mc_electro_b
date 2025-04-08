<?php

namespace App\Http\Controllers;

class PromotionController extends Controller
{
    public function all()
    {
        return view('sample.main.pages.promotions.index', ['title' => "Акции", 'description' => ""]);
    }

    public function show()
    {
        return view('sample.main.pages.promotions.one', ['title' => "Акция", 'description' => ""]);
    }
}
