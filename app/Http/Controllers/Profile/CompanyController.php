<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function all()
    {
        return view('sample.main.pages.profile.companies.index', ['title' => "Ваши комапании", 'description' => ""]);
    }
}
