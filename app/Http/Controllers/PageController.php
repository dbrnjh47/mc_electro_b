<?php

namespace App\Http\Controllers;

use App\Http\Services\Models\BannerModelService;
use App\Http\Services\Models\CategoryModelService;
use App\Models\Company\Company;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        // $products = Product::with(['medias', 'documents'])->limit(5)->get();
        // dd($products[1]->documents[0]->path);
        // dump($products);
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

        $companies = Company::select(['id', 'preview', 'name', 'slug'])
            ->where('is_on', 1)
            ->whereNotNull("preview")
            ->inRandomOrder()
            ->limit(15)
            ->get();

        //

        $products = Product::select(['id', 'mrp', 'slug', 'step'])
            ->with([
                'medias' => function ($q) {
                    $q->select(['name', 'product_id'])->limit(1);
                },
                'locale' => function ($q) {
                    $q->where('locale_id', app()->user_local->id);
                },
            ])
            ->whereHas('locale', function ($q) {
                $q->where('locale_id', app()->user_local->id);
            })
            ->where(function($query) {
                $query->whereNull('company_id')
                      ->orWhereHas('company', function($q) {
                          $q->where('is_on', 1);
                      });
            })
            ->inRandomOrder()
            ->limit(8)
            ->get();
            // dd( $products);

        //

        $banners = (new BannerModelService)->getByKey("home");
        $title = "Test";
        $description = "description";
        return view('sample.main.pages.index', compact(
            "categories",
            "banners",
            "title",
            "description",
            "companies",
            "products"
        ));
    }

    public function feedback(Request $request)
    {
        return view('sample.main.pages.feedback.index', ['title' => "Спасибо!"]);
    }
}
