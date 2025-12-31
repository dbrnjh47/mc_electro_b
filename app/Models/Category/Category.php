<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Controllers\Controller;
use App\Http\Services\Category\CategoryPathService;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use App\Observers\CategoryObserver;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use App\Models\Traits\Standardable;

#[ObservedBy([CategoryObserver::class])]
class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    use Sluggable;
    use Standardable;
    protected $guarded = false;
    const PATH = "/assets/categories/previews/";

    protected $appends = ['preview_path'];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_parent_id');
    }

    public function child_categories()
    {
        return $this->hasMany(Category::class, 'category_parent_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,          // Целевая модель
            (new ProductCategory())->getTable(),     // Промежуточная таблица
        );
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => false, // обновлять slug при изменении title
                'unique' => true, // гарантировать уникальность
                'separator' => '-', // разделитель
                // 'maxLength' => 100, // максимальная длина
                // 'method' => function ($string, $separator) {
                //     return Str::slug($string, $separator);
                // }
            ]
        ];
    }

    public function getPreviewPathAttribute()
    {
        return ($this->preview ? Controller::photoAccessor($this->preview, self::PATH) : null);
    }
    public function getСhildrenIds()
    {
        if (isset($this->children_ids)) {
            return $this->children_ids;
        }

        $category_table = $this->getTable();
        $this->children_ids = DB::table(DB::raw("
            (WITH RECURSIVE CategoryPath AS (
                SELECT
                    id,
                    category_parent_id,
                    0 AS level
                FROM
                    {$category_table}
                WHERE
                    category_parent_id = {$this->id}
                UNION ALL
                SELECT
                    c.id,
                    c.category_parent_id,
                    cp.level + 1 AS level
                FROM
                    {$category_table} AS c
                INNER JOIN
                    CategoryPath cp ON c.category_parent_id = cp.id
            )
            SELECT * FROM CategoryPath as cp) as subquery
        "))->get();

        return $this->children_ids;
    }
    public function getParentIds()
    {
        if (isset($this->parent_ids)) {
            return $this->parent_ids;
        }

        $category_table = $this->getTable();
        $this->parent_ids = DB::table(DB::raw("
            (WITH RECURSIVE CategoryPath AS (
                SELECT
                    id,
                    category_parent_id,
                    0 AS level
                FROM
                    {$category_table}
                WHERE
                    id = {$this->id}
                UNION ALL
                SELECT
                    c.id,
                    c.category_parent_id,
                    cp.level + 1 AS level
                FROM
                    {$category_table} AS c
                INNER JOIN
                    CategoryPath cp ON c.id = cp.category_parent_id
                WHERE c.category_parent_id IS NOT NULL
            )
            SELECT * FROM CategoryPath as cp) as subquery
        "))->get();

        return $this->parent_ids;
    }

    public function deleteSubCategory()
    {
        Subcategory::where("category_child_id", $this->id)->delete();
    }

    public function createSubCategory()
    {
        if ($this->category_parent_id) {
            $parent_ids = $this->getParentIds();

            $data = [];
            foreach ($parent_ids as $parent_id) {
                $data[] = [
                    'category_id' => $parent_id->category_parent_id,
                    'category_child_id' => $this->id,
                ];
            }

            Subcategory::upsert(
                $data,
                ['category_id', 'category_child_id'], // Уникальные ключи
                [] // Поля для обновления (пусто = не обновлять)
            );
        }
    }

    public function createCategoryPath()
    {
        $categoryPathService = (new CategoryPathService($this));
        $categoryPathService->delete();
        $categoryPathService->createAll();
    }
}
