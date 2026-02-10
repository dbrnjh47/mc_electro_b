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
        Schema::create('delivery_methods', function (Blueprint $table) {
            $table->id();

            $table->string('title', 64);
            $table->string('slug', 64)->unique()->index();

            $table->string('description', 128)->nullable();
            $table->decimal('price', 10, 2)->unsigned()->default(0);
            $table->decimal('sum_to_free', 10, 1)->unsigned()->default(0)->nullable()->comment("Цена корзины для бесплатной доставки");

            $table->boolean('is_on')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_methods');
    }
};
