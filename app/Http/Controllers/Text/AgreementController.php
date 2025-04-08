<?php

namespace App\Http\Controllers\Text;

use App\Http\Controllers\Controller;

class AgreementController extends Controller
{
    public function show()
    {
        return view('sample.main.pages.text.agreement', ['title' => "Соглашение", 'description' => ""]);
    }
}
