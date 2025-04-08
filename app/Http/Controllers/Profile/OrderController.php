<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function all()
    {
        return view('sample.main.pages.profile.orders.index', ['title' => "Заказы", 'description' => ""]);
    }

    public function show()
    {
        return view('sample.main.pages.profile.orders.one', ['title' => "Заказ №", 'description' => ""]);
    }
}
