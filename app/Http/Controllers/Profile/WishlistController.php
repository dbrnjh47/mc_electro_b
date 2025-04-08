<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function show()
    {
        return view('sample.main.pages.profile.wishlist', ['title' => "Избранное", 'description' => ""]);
    }
}
