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
        Schema::create('delivery_method_cities', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('delivery_method_id');
            $table->unsignedBigInteger('city_id');

            $table->foreign('delivery_method_id')->references('id')->on('delivery_methods')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')

            $table->unique(['delivery_method_id', 'city_id'], 'delivery_method_cities_by_del_m_and_city_id_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_method_cities');
    }
};
