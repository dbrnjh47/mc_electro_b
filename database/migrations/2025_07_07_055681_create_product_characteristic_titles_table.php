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
        Schema::create('product_characteristic_titles', function (Blueprint $table) {
            $table->id();

            $table->string('text', 128);

            $table->unsignedBigInteger('product_characteristic_category_id')->nullable();

            $table->unsignedBigInteger('unit_id')->nullable();
            $table->unsignedBigInteger('to_unit_id')->nullable();


            $table->foreign('unit_id')->references('id')->on('units')->onUpdate('cascade'); // ->onDelete('cascade')
            $table->foreign('to_unit_id')->references('id')->on('units')->onUpdate('cascade'); // ->onDelete('cascade')
            $table->foreign('product_characteristic_category_id', "product_ch_t_product_ch_category_id_foreign")->references('id')->on('product_characteristic_categories')->onUpdate('cascade'); // ->onDelete('cascade')

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_characteristic_titles');
    }
};
