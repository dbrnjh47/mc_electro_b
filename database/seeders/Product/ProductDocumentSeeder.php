<?php

namespace Database\Seeders\Product;

use App\Models\Product\Document\ProductDocument;
use App\Models\Product\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_count = Product::count();
        ProductDocument::factory(($product_count))
            ->create();
    }
}
