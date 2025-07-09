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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('uuid', 124)->nullable()->index();
            $table->string('article', 124)->nullable()->index();

            $table->string('slug', 128)->unique();

            $table->decimal('weight', 10, 4); // кг, может в граммы?
            $table->decimal('length', 10, 4); // мм
            $table->decimal('width', 10, 4); // мм
            $table->decimal('height', 10, 4); // мм

            $table->integer('step')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
