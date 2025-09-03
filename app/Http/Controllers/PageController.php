<?php

namespace App\Http\Controllers;

use App\Http\Services\Models\BannerModelService;
use App\Http\Services\Models\CategoryModelService;
use App\Http\Services\User\WishListService;
use App\Models\Company\Company;
use App\Models\Product\Product;
use Illuminate\Http\Request;


class PageController extends Controller
{
    public function index(Request $request)
    {
        // $r = (new WishListService())->get();
        // dd($r);

        // $r = (new WishListService())->count();
        // dd($r);

        (new WishListService)->add(3);
        // (new WishListService)->delite(2);

        // (new WishListService(0))->clear();


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
            ])
            ->with([
                'categories' => function ($q) {
                    $q = $q->whereHas('category', function ($q2) {
                        $q2 = CategoryModelService::whereOn($q2);
                    });
                },
            ])
            ->where(function($query) {
                $query->whereNull('company_id')
                      ->orWhereHas('company', function($q) {
                          $q->where('is_on', 1);
                      });
            })
            ->whereHas('categories.category', function ($q) {
                $q = CategoryModelService::whereOn($q);
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
