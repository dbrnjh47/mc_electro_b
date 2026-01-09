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
        $total = Product::count();
        if($total < 1000){
            $total = $total * rand(1, 2);
        }
        $batchSize = 300;

        for ($i = 0; $i < $total; $i += $batchSize) {
            $currentBatchSize = min($batchSize, $total - $i);

            ProductDocument::factory($currentBatchSize)->create();

            // Сбрасываем соединение чтобы избежать таймаута
            // if ($i % 50000 == 0) {
            //     DB::reconnect();
            // }
        }
    }
}
