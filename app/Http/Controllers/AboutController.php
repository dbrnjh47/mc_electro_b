<?php

namespace App\Http\Controllers;

use App\Http\Services\BreadcrumbService;
use App\Http\Services\Models\CategoryModelService;
use App\Http\Services\Models\Product\ProductModelService;
use App\Http\Services\User\WishListService;
use App\Models\Company\Company;

class AboutController extends Controller
{
    public function show()
    {
        $wishlist_id = (new WishListService(0))->getID();

        $products = (new ProductModelService(select_list: ['id', 'mrp', 'slug', 'step', 'name', 'article']));
        $products->wishlist($wishlist_id);
        $products = $products->getModel()
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
            // ->whereHas('categories.category', function ($q) {
            //     $q = CategoryModelService::whereOn($q);
            // })
            ->inRandomOrder()
            ->limit(6)
            ->get();
        //

        $title = "О нас";
        $description = "";

        $breadcrumbs = (new BreadcrumbService);
        $breadcrumbs->add($title, route("about"));

        return view(
            'sample.main.pages.about',
            compact(
                'title',
                'description',
                'breadcrumbs',
                'products'
            )
        );
    }
}
