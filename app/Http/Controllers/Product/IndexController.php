<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Product\Information\ReviewController;
use App\Http\Requests\Product\ShowRequest;
use App\Http\Services\BreadcrumbService;
use App\Http\Services\Models\CategoryModelService;
use App\Http\Services\Models\Product\ProductCharacteristic\ProductCharacteristicModelService;
use App\Http\Services\Models\ProductModelService;
use App\Models\Product\Review\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class IndexController extends Controller
{
    public function show(ShowRequest $request)
    {
        $product = (new ProductModelService(slug: $request->slug, select_list: [
            "id",
            "uuid",
            "company_id",
            "article",
            "slug",
            "weight",
            "length",
            "width",
            "height",
            "step"
        ]))
            ->getModel()
            ->where(function($query) {
                $query->whereNull('company_id')
                      ->orWhereHas('company', function($q) {
                          $q->where('is_on', 1);
                      });
            })
            ->with([
                'locale' => function ($q) {
                    $q->where('locale_id', app()->user_local->id);
                },
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
                    $q = $q->select(['title', 'name', 'product_id'])->where("locale_id", app()->user_local->id);
                },
                'description' => function ($q) {
                    $q = $q->select(['text', 'product_id'])->where("locale_id", app()->user_local->id);
                },
                'company' => function ($q) {
                    $q = $q->select(['id', 'preview', 'name', 'slug', 'count_reviews', 'grade_review']);
                    $q = $q->withCount(['products']);
                },
                'company.locale' => function ($q) {
                    $q->select(['short', 'company_id'])->where('locale_id', app()->user_local->id)->whereNotNull("short");
                },

                //

                'reviews' => function ($q) {
                    $q->select(['id', 'quantity', 'product_id', 'user_id', 'created_at'])
                        ->where('locale_id', app()->user_local->id)
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
                $query->where(function ($q) {
                    $q->whereNotNull('value') // value != null
                        ->orWhereHas('locale', function ($q2) {
                            $q2 = $q2->where("locale_id", app()->user_local->id);
                        });  // ИЛИ local существует
                })
                    ->with([
                        'locale' => function ($q) {
                            $q->select(['text', 'product_characteristic_id'])->where('locale_id', app()->user_local->id);
                        },
                        'title' => function ($q) {
                            $q->select(['id', 'product_characteristic_category_id', 'unit_id', 'to_unit_id']);
                        },
                        'title.locale' => function ($q) {
                            $q->select(['text', 'product_characteristic_title_id'])->where('locale_id', app()->user_local->id);
                        },
                        'title.category' => function ($q) {
                            $q->select(['id']);
                        },
                        'title.category.locale' => function ($q) {
                            $q->select(['title', 'product_characteristic_category_id'])->where('locale_id', app()->user_local->id);
                        },
                        //
                        'title.unit' => function ($q) {
                            $q->select(['id']);
                        },
                        'title.toUnit' => function ($q) {
                            $q->select(['id']);
                        },
                        'title.unit.locale' => function ($q) {
                            $q->select(['text', 'unit_id'])->where('locale_id', app()->user_local->id);
                        },
                        'title.toUnit.locale' => function ($q) {
                            $q->select(['text', 'unit_id'])->where('locale_id', app()->user_local->id);
                        },

                        // 'title.unitRules' => function ($q) {
                        //     $q->select(['unit_id', 'to_unit_id', 'value', 'action']);
                        // },
                    ])
                    ->whereHas('title.locale', function ($q) {
                        $q->where('locale_id', app()->user_local->id);
                    });
            }])
            ->whereHas('categories.category', function ($q) {
                $q = CategoryModelService::whereOn($q);
            })
            ->whereHas('locale', function ($q) {
                $q->where('locale_id', app()->user_local->id);
            })
            ->withCount(['reviews' => function (Builder $q) {
                $q->where('locale_id', app()->user_local->id)->where("is_on", 1);
            },])
            ->withSum('reviews', 'quantity')
            ->firstOrFail();

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
                    (object)['id' => null, 'locale' => (object)["title" => 'Другое']] :
                    $chars->first()->title->category,
                'items' => $chars
            ];
        })->sortBy(function ($group) {
            return $group['category']->id === null ? 9999 : $group['category']->id;
        })->values();

        //
        // dump($category);
        [$path_slugs, $breadcrumbs] = BreadcrumbService::getForCategory($category);

        $breadcrumbs->add($product->locale->name, "#");

        //

        if($product->reviews_count)
        {
            $review_statistics = ProductReview::select('quantity')
            ->selectRaw('COUNT(*) as count')
            ->where([
                ["product_id", $product->id],
                ["locale_id", app()->user_local->id],
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
            'title' => $product->locale->name,
            'description' => "",
            'product' => $product,
            'breadcrumbs' => $breadcrumbs,
            'review_statistics' => $review_statistics
        ]);
    }
}
