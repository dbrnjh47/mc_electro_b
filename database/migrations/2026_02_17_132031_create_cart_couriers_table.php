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
        Schema::create('cart_couriers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('city');
            $table->string('street');
            $table->string('house');
            $table->string('apartment')->nullable();

            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')
            $table->foreign('cart_id')->references('id')->on('carts')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_couriers');
    }
};
