<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;

class AboutController extends Controller
{
    public function show()
    {
        return view('sample.main.pages.about', ['title' => "О нас", 'description' => ""]);
    }
}
