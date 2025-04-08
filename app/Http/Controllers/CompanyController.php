<?php

namespace App\Http\Controllers;

class CompanyController extends Controller
{
    public function all()
    {
        return view('sample.main.pages.company.index', ['title' => "Компании", 'description' => ""]);
    }

    public function show()
    {
        return view('sample.main.pages.company.one', ['title' => "Компания", 'description' => ""]);
    }
}
