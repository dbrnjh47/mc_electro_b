<?php

namespace App\Models\Point\Link;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointLink extends Model
{
    /** @use HasFactory<\Database\Factories\Point\PointLinkFactory> */
    use HasFactory;
    protected $guarded = false;
    public function category()
    {
        return $this->hasOne(PointLinkCategory::class, 'id', 'point_link_category_id');
    }
}
