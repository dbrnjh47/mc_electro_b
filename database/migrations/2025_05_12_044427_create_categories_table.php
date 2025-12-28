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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->string('slug', 64)->unique();
            $table->boolean('is_on')->default(1);
            $table->string('preview')->nullable();

            $table->text('description')->nullable();

            $table->unsignedBigInteger('category_parent_id')->nullable();

            $table->foreign('category_parent_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('categories_sub', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('category_child_id');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_child_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['category_id', 'category_child_id'], 'categories_sub_unique');

            $table->timestamps();
        });

        Schema::create('category_paths', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id'); // последняя категория
            $table->string('path')->index()->unique();
            $table->string('category_ids')->index()->unique();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_paths');
        Schema::dropIfExists('categories_sub');
        Schema::dropIfExists('categories');
    }
};
