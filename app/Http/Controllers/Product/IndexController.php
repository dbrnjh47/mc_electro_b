<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Product\Information\ReviewController;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\ShowRequest;
use App\Http\Services\BreadcrumbService;
use App\Http\Services\Models\CategoryModelService;

use App\Http\Services\User\WishListService;
use App\Http\Standards\ProductStandard;
use App\Http\Standards\PropertyStandard;
use App\Models\Product\Product;
use App\Models\Product\Review\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class IndexController extends Controller
{
    public function show(ShowRequest $request)
    {
        $wishlist_id = (new WishListService(0))->getID();

        $productFilter = app()->make(ProductFilter::class, [
            'params' => [
                "slug" => $request->slug,
            ]
        ]);
        $productStandard = app()->make(ProductStandard::class, [
            'params' => [
                "is_on" => 1,
                "wishlist" => $wishlist_id,
                "preview" => 1
            ],
        ]);

        $propertyStandard = app()->make(PropertyStandard::class, ['params' => [
            "is_on" => 1,
            "unit" => 1,
            "section" => 1,
            "sort" => 1
        ]]);

        $product = Product::standard($productStandard)
            ->filter($productFilter)
            ->select([
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
            ->with([
                'categories.category' => function ($q) {},
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
                'productProperties' => function ($q) use ($propertyStandard) {
                    $q->whereHas('property', function ($q2) use ($propertyStandard) {
                        $q2->standard($propertyStandard);
                    })
                    ->with([
                        'value',
                        'property' => function ($q2) use ($propertyStandard) {
                            $q2->standard($propertyStandard);
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

        $category = null;
        // нужно узнать подходящую категорию
        foreach ($product->categories as $c) {
            $c->category->parents(on_check: 0);

            if (!empty($c->category->parents_paths)) {

                if(isset($request->category_slug))
                {
                    foreach($c->category->parents_paths as $parents_path)
                    {
                        $parts = explode('/', $parents_path);
                        $is_included = in_array($request->category_slug, $parts, true);
                        if($is_included)
                        {
                            $category = $c->category;
                        }
                    }

                } else {
                    $category = $c->category;
                }
            }
        }
        if (!$category) {
            $this->notFound();
        }

        $category->parent_slugs = explode("/", $category->parents_paths[0]);

        if (!isset($category->parent_slugs)) {
            $this->notFound();
        }

        $category->setCurrentParentPath();

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
        // dd($product);
        //
        // dump($category);
        [$path_slugs, $breadcrumbs] = BreadcrumbService::getForCategory($category);

        $breadcrumbs->add($product->name, "#");

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

        // dd($breadcrumbs);
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
