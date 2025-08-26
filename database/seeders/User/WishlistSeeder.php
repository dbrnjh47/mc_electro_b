<?php

namespace Database\Seeders\User;

use App\Models\Product\Product;
use App\Models\User;
use App\Models\User\Wishlist\Wishlist;
use App\Models\User\Wishlist\WishlistProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_ids = User::select('id')->get()->pluck('id');

        foreach($user_ids as $user_id)
        {
            $count = rand(1, 15);
            if($user_id == 1){$count = rand(50, 150);}
            $product_ids = Product::select('id')->inRandomOrder()->take($count)->pluck('id');

            $wishlist = Wishlist::create([
                "user_id" => $user_id,
            ]);

            foreach($product_ids as $product_id)
            {
                WishlistProduct::factory(1)->create([
                    "product_id" => $product_id,
                    "wishlist_id" => $wishlist->id,
                ]);
            }
        }
    }
}
