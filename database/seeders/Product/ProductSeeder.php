<?php

namespace Database\Seeders\Product;

use App\Models\Category\Category;
use App\Models\Product\Product;
use Database\Seeders\Product\ProductCharacteristic\ProductCharacteristicSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::where("id", "!=", 1)->get();
        foreach($categories as $category)
        {
            Product::factory(rand(1, 30))->create();
        }

        $this->call(ProductMediaSeeder::class);
        $this->call(ProductDocumentSeeder::class);
        $this->call(ProductCharacteristicSeeder::class);
    }
}
