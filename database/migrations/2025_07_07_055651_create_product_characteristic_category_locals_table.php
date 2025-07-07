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
        Schema::create('product_characteristic_category_locals', function (Blueprint $table) {
            $table->id();

            $table->string('title', 128);
            $table->unsignedBigInteger('locale_id');
            $table->unsignedBigInteger('product_characteristic_category_id');

            $table->foreign('locale_id')->references('id')->on('locales')->onUpdate('cascade'); // ->onDelete('cascade')
            $table->foreign('product_characteristic_category_id','product_ch_c_locals_product_ch_c_id_foreign')->references('id')->on('product_characteristic_categories')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_characteristic_category_locals');
    }
};
