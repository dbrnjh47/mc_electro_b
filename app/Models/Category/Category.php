<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $guarded = false;

    public function locale()
    {
        return $this->hasOne(CategoryLocal::class, 'city_id', 'id');
    }

    public function parents($max_level = null)
    {
        $results = DB::table(DB::raw("
            (WITH RECURSIVE CategoryPath AS (
                SELECT
                    category_parent_id,
                    category_child_id
                FROM
                    ".(new Subcategory())->getTable()."
                WHERE
                    category_child_id = {$this->id}
                UNION ALL
                SELECT
                    c.category_parent_id,
                    c.category_child_id
                FROM
                    ".(new Subcategory())->getTable()." AS c
                INNER JOIN
                    CategoryPath cp ON c.category_child_id = cp.category_parent_id
            )
            SELECT * FROM CategoryPath as cp) as subquery
        "))->get();
        dd($results);
    }
}
