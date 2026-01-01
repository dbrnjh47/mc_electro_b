<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Product\Information\ReviewController;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\ShowRequest;
use App\Http\Services\BreadcrumbService;
use App\Http\Services\Models\CategoryModelService;

use App\Http\Services\User\WishListService;
use App\Http\Standards\CategoryStandard;
use App\Http\Standards\ProductStandard;
use App\Http\Standards\PropertyStandard;
use App\Models\Category\Category;
use App\Models\Category\CategoryPath;
use App\Models\Product\Product;
use App\Models\Product\Review\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class IndexController extends Controller
{
    public $categoryStandard, $propertyStandard, $productFilter;
    public function __construct() {
        parent::__construct();
        $this->categoryStandard = app()->make(CategoryStandard::class, [
            'params' => [
                "is_on" => 1,
            ],
        ]);

        $this->propertyStandard = app()->make(PropertyStandard::class, ['params' => [
            "is_on" => 1,
            "unit" => 1,
            "section" => 1,
            "sort" => 1
        ]]);
    }

    public function getPath($path_id = null)
    {
        $path = null;
        if ($path_id) {
            $path = CategoryPath::whereHas(
                'category',
                function ($q) {
                    $q = $q->standard($this->categoryStandard)
                    ->whereHas(
                        'products',
                        function ($q)  {
                            $q = $q->filter($this->productFilter);
                        });
                })
                ->find($path_id);
        }

        if (!$path) {
            // определим нужный путь
            $path = CategoryPath::whereHas(
                'category',
                function ($q)  {
                    $q = $q->standard($this->categoryStandard)
                        ->whereHas(
                            'products',
                            function ($q)  {
                                $q = $q->filter($this->productFilter);
                            });
                })
                ->firstOrFail();
        }

        return $path;
    }

    public function show(ShowRequest $request)
    {
        $this->productFilter = app()->make(ProductFilter::class, [
            'params' => [
                "slug" => $request->slug,
            ]
        ]);
        $path = $this->getPath((
            isset($request->path_id) && $request->path_id
            ? $request->path_id
            : null)
        );

        $breadcrumbs = CategoryIndexController::breadcrumb($path);

        //

        $wishlist_id = (new WishListService(0))->getID();

        $productStandard = app()->make(ProductStandard::class, [
            'params' => [
                "is_on" => 1,
                "wishlist" => $wishlist_id,
                "preview" => 1
            ],
        ]);

        $product = Product::select([
            "id",
            "name",
            "short_desc",
            "desc",
            "uuid",
            "company_id",
            "article",
            "slug",
            "weight",
            "length",
            "width",
            "height",
            "step"
        ])
            ->standard($productStandard)
            ->filter($this->productFilter)
            ->with([
                'documents' => function ($q) {
                    $q = $q->select(['title', 'name', 'product_id']);
                },
                'company' => function ($q) {
                    $q = $q->select(['id', 'preview', 'name', 'short', 'slug', 'count_reviews', 'grade_review']);
                    $q = $q->withCount(['products']);
                },

                //

                'reviews' => function ($q) {
                    $q->select(['id', 'quantity', 'product_id', 'user_id', 'created_at'])
                        ->orderBy("created_at", "desc")
                        ->limit(ReviewController::LIMIT);
                },
                'reviews.descriptions' => function ($q) {
                    $q->select(['id', 'text', 'type', 'product_review_id'])
                        ->orderByRaw("FIELD(type, 'comment', 'dignity', 'flaw')");
                },
                'reviews.medias' => function ($q) {
                    $q->select(['id', 'name', 'product_review_id']);
                },
                'reviews.user' => function ($q) {
                    $q->select(['id', 'name']);
                },

                //
                'productProperties' => function ($q) {
                    $q->whereHas('property', function ($q2) {
                        $q2->standard($this->propertyStandard);
                    })
                        ->with([
                            'value',
                            'property' => function ($q2) {
                                $q2->standard($this->propertyStandard);
                            }
                        ]);
                },
            ])
            ->withCount(['reviews' => function (Builder $q) {
                $q->where("is_on", 1);
            },])
            ->withSum('reviews', 'quantity')
            ->firstOrFail();

        //

        // отсортируем по секциям характеристики
        $product->propertySections = $product->productProperties->groupBy(function ($char) {
            return $char->property->section ? $char->property->section->id : 'other';
        })->map(function ($chars, $key) {
            return [
                'section' =>
                $key === 'other' ?
                    (object)['id' => null, "title" => 'Другое'] :
                    $chars->first()->property->section,
                'items' => $chars
            ];
        })->sortBy(function ($group) {
            return $group['section']->id === null ? 9999 : $group['section']->id;
        })->values();
        unset($product->productProperties);
        //

        if ($product->reviews_count) {
            $review_statistics = ProductReview::select('quantity')
                ->selectRaw('COUNT(*) as count')
                ->where([
                    ["product_id", $product->id],
                    ["is_on", 1]
                ])
                ->groupBy('quantity')
                ->orderBy('quantity', 'desc')
                ->get();
        } else {
            $review_statistics = null;
        }

        $breadcrumbs->add(
            $product->name,
            ""
        );

        // dd($review_statistics);
        return view('sample.main.pages.product.index', [
            'title' => $product->name,
            'description' => "",
            'product' => $product,
            'breadcrumbs' => $breadcrumbs,
            'review_statistics' => $review_statistics
        ]);
    }
}
