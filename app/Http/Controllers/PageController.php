<?php

namespace App\Http\Controllers;

use App\Http\Services\Models\BannerModelService;
use App\Http\Services\Models\CategoryModelService;

use App\Http\Services\User\WishListService;
use App\Http\Standards\ProductStandard;
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

        // (new WishListService)->add(413);
        // (new WishListService)->delite(2);

        // (new WishListService(0))->clear();


        // $products = Product::with(['medias', 'documents'])->limit(5)->get();
        // dd($products[1]->documents[0]->path);
        // dump($products);
        // end test

        $wishlist_id = (new WishListService(0))->getID();

        //

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

        $productStandard = app()->make(ProductStandard::class, [
            'params' => [
                "is_on" => 1,
                "wishlist" => $wishlist_id,
                "preview" => 1
            ],
        ]);

        $products = Product::standard($productStandard)
            ->select(['id', 'mrp', 'slug', 'step', 'name', 'article'])
            ->inRandomOrder()
            ->limit(8)
            ->get();

        // dd( $products);

        //

        $banners = (new BannerModelService)->getByKey("home");
        $title = app()->settings->abbreviation." ".app()->settings->name;
        $description = "";
        return view('sample.main.pages.index', compact(
            "categories",
            "banners",
            "title",
            "description",
            "products"
        ));
    }

    public function feedback(Request $request)
    {
        return view('sample.main.pages.feedback.index', ['title' => "Спасибо!"]);
    }
}
