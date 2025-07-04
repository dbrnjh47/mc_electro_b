<?php

namespace App\Http\Controllers;

use App\Http\Services\Models\BannerModelService;
use App\Http\Services\Models\CategoryModelService;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('photos')->limit(10)->get();
        dd($products[1]->photos[0]->photo);
        // end test

        $service_categories = (new CategoryModelService);
        $categories = $service_categories
            ->model
            ->with(['relation_childrens' => function ($query) {
                $query->whereHas('category', function ($q) {
                    $q = CategoryModelService::whereOn($q);
                })->with('category'); // Дополнительно подгружаем категорию, если нужно
            }])
            ->doesntHave('relation_parent')
            ->inRandomOrder()
            ->limit(4);

        $categories = $categories->get();
        // dd($categories);
        //

        //

        $banners = (new BannerModelService)->getByKey("home");
        $title = "Test";
        $description = "description";
        return view('sample.main.pages.index', compact("categories", "banners", "title", "description"));
    }

    public function feedback(Request $request)
    {
        return view('sample.main.pages.feedback.index', ['title' => "Спасибо!"]);
    }
}
