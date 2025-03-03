<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Services\Auth\IndexServices;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        Controller::__construct();
    }

    public function logout(Request $request)
    {
        (new IndexServices)->logout($request);

        return redirect()->route('home');
    }
}
