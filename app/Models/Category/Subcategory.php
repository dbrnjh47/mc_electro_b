<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = "categories_sub";
    use HasFactory;
    protected $guarded = false;

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_child_id');
    }
}
