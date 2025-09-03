<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Product\Information\ReviewController;
use App\Http\Requests\Product\ShowRequest;
use App\Http\Services\BreadcrumbService;
use App\Http\Services\Models\CategoryModelService;
use App\Http\Services\Models\Product\ProductCharacteristic\ProductCharacteristicModelService;
use App\Http\Services\Models\ProductModelService;
use App\Http\Services\User\WishListService;
use App\Models\Product\Review\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class IndexController extends Controller
{
    public function show(ShowRequest $request)
    {
        $wishlist_id = (new WishListService(0))->getID();

        $product = (new ProductModelService(slug: $request->slug, select_list: [
            "id",
            "name",
            "uuid",
            "company_id",
            "article",
            "slug",
            "weight",
            "length",
            "width",
            "height",
            "step"
        ]));

        $product->wishlist($wishlist_id);

        $product = $product->getModel()
            ->where(function($query) {
                $query->whereNull('company_id')
                      ->orWhereHas('company', function($q) {
                          $q->where('is_on', 1);
                      });
            })
            ->with([
                'categories' => function ($q) {
                    $q = $q->whereHas('category', function ($q2) {
                        $q2 = CategoryModelService::whereOn($q2);
                    });
                },
                'categories.category' => function ($q) {
                },
                'medias' => function ($q) {
                    $q->select(['name', 'product_id']);
                },
                'documents' => function ($q) {
                    $q = $q->select(['title', 'name', 'product_id']);
                },
                'description' => function ($q) {
                    $q = $q->select(['text', 'product_id']);
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
            ])
            ->with(['characteristics' => function ($query) {
                $query->select(['text', 'id'])->where(function ($q) {
                    $q->whereNotNull('value');
                })
                    ->with([
                        'title' => function ($q) {
                            $q->select(['id', 'product_characteristic_category_id', 'text', 'unit_id', 'to_unit_id']);
                        },
                        'title.category' => function ($q) {
                            $q->select(['id', 'title']);
                        },
                        //
                        'title.unit' => function ($q) {
                            $q->select(['id', 'text']);
                        },
                        'title.toUnit' => function ($q) {
                            $q->select(['id', 'text']);
                        },

                        // 'title.unitRules' => function ($q) {
                        //     $q->select(['unit_id', 'to_unit_id', 'value', 'action']);
                        // },
                    ]);
            }])
            ->whereHas('categories.category', function ($q) {
                $q = CategoryModelService::whereOn($q);
            })
            ->withCount(['reviews' => function (Builder $q) {
                $q->where("is_on", 1);
            },])
            ->withSum('reviews', 'quantity');

        $product = $product->firstOrFail();
        // dd($product);
        //

        $category = null;
        // нужно узнать подходящую категорию
        foreach($product->categories as $c)
        {
            $c->category->parents(on_check: 0);
            if(!empty($c->category->parents_paths))
            {
                $category = $c->category;
            }
        }
        if(!$category){$this->notFound();}

        foreach($category->parents_paths as $parents_path)
        {
            if(isset($request->category_slug))
            {
                $parts = explode('/', $parents_path);
                $is_included = in_array($request->category_slug, $parts, true);
                if($is_included)
                {
                    $category->parent_slugs = $parts;
                    break;
                }
            } else {
                $category->parent_slugs = explode("/", $parents_path);
                break;
            }
        }

        if(!isset($category->parent_slugs)){$this->notFound();}

        $category->setCurrentParentPath();

        //

        $product->characteristics = (new ProductCharacteristicModelService)->setUnitRules($product->characteristics);
        // dd($product->characteristics);

        $product->characteristics = $product->characteristics->groupBy(function ($char) {
            return $char->title->category ? $char->title->category->id : 'other';
        })->map(function ($chars, $key) {
            return [
                'category' => $key === 'other' ?
                    (object)['id' => null, "title" => 'Другое'] :
                    $chars->first()->title->category,
                'items' => $chars
            ];
        })->sortBy(function ($group) {
            return $group['category']->id === null ? 9999 : $group['category']->id;
        })->values();

        //
        // dump($category);
        [$path_slugs, $breadcrumbs] = BreadcrumbService::getForCategory($category);

        $breadcrumbs->add($product->name, "#");

        //

        if($product->reviews_count)
        {
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
