<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_characteristics', function (Blueprint $table) {
            $table->id();

            $table->decimal('value', 11, 6)->nullable();

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_characteristic_title_id');

            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')
            $table->foreign('product_characteristic_title_id', "product_ch_product_ch_title_id_foreign")->references('id')->on('product_characteristic_titles')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_characteristics');
    }
};
