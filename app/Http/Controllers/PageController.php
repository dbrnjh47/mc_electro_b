<?php

namespace App\Http\Controllers;

use App\Http\Services\Models\BannerModelServices;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $banners = (new BannerModelServices)->getByKey("home");
        $title = "Test";
        $description = "description";
        return view('sample.main.pages.index', compact("banners", "title", "description"));
    }

    public function feedback(Request $request)
    {
        return view('sample.main.pages.feedback.index', ['title' => "Спасибо!"]);
    }
}
