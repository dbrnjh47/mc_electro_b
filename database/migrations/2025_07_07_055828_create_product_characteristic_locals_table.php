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
        Schema::create('product_characteristic_locals', function (Blueprint $table) {
            $table->id();

            $table->string('text', 128);
            $table->unsignedBigInteger('locale_id');
            $table->unsignedBigInteger('product_characteristic_id');

            $table->foreign('locale_id')->references('id')->on('locales')->onUpdate('cascade'); // ->onDelete('cascade')
            $table->foreign('product_characteristic_id')->references('id')->on('product_characteristics')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_characteristic_locals');
    }
};
