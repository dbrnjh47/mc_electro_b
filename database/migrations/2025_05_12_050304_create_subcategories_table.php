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
        Schema::create('categories_sub', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_parent_id');
            $table->unsignedBigInteger('category_child_id');

            $table->foreign('category_parent_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_child_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['category_parent_id', 'category_child_id'], 'categories_sub_unique');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_sub');
    }
};
