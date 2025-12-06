<?php

namespace App\Http\Services\Models\Product;

use App\Http\Services\Models\ControllerModelService;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductModelService extends ControllerModelService
{
    public $pagination = 8, $slug, $select_list;
    public function __construct($slug = null, $select_list = null, $model = null)
    {
        $this->slug = $slug;
        $this->select_list = $select_list;
        if($model)
        {
            $this->model = $model;
        }
        $this->model = $this->defult();
    }

    public function getModel()
    {
        return $this->model;
    }

    public function defult()
    {
        if(!$this->model){$this->model = Product::query();}


        if($this->select_list)
        {
            $this->model->select($this->select_list);
        }

        $this->model = ProductModelService::whereOn($this->model);

        if($this->slug)
        {
            $this->model->where("slug", $this->slug);
        }

        return $this->model;
    }

    public static function whereOn($model)
    {
        return $model;
    }

    public function get()
    {
        return $this->model->get();
    }

    public function pagination($page = null)
    {
        if($page)
        {
            return $this->model->paginate($this->pagination, page:$page);
        }
        return $this->model->paginate($this->pagination);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function wishlist($wishlist_id)
    {
        if($wishlist_id)
        {
            $this->model->withCount(['wishlist_products' => function (Builder $q) use ($wishlist_id) {
                    $q->where("wishlist_id", $wishlist_id)->limit(1);
                },
            ]);
        }
    }
}
