<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ShowWishlistRequest;
use App\Http\Services\UserCache\WishListService;
use App\Models\Product\Product;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class WishlistController extends Controller
{
    public $limit = 9;
    public function show(ShowWishlistRequest $request)
    {
        $products = (new WishListService)->get();

        $currentPage = Paginator::resolveCurrentPage() ?: 1;
        $currentItems = array_slice($products, ($currentPage - 1) * $this->limit, $this->limit);

        $paginatedItems = new LengthAwarePaginator(
            $currentItems,
            count($products),
            $this->limit,
            $currentPage,
            [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );

        $products = $paginatedItems->items();

        if(!empty($products))
        {
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
                ->whereIn("id", $products)
                ->get();
        }

        return view('sample.main.pages.profile.wishlist', [
            'title' => "Избранное",
            'description' => "",
            'products' => $products,
            'pagination' => $paginatedItems
        ]);
    }
}
