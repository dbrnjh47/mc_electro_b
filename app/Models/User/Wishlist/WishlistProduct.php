<?php

namespace App\Models\User\Wishlist;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistProduct extends Model
{
    /** @use HasFactory<\Database\Factories\User\Wishlist\WishlistProductFactory> */
    use HasFactory;
    protected $guarded = false;
}
