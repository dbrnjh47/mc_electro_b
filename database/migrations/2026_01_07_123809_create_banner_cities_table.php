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
        Schema::create('banner_cities', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('banner_id');


            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')
            $table->foreign('banner_id')->references('id')->on('banners')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')

            $table->unique(['city_id', 'banner_id'], 'city_banner_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner_cities');
    }
};
