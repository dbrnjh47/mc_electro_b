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
        Schema::create('product_review_descriptions', function (Blueprint $table) {
            $table->id();

            $table->string('text', 256);
            $table->enum('type', ['comment', 'flaw', 'dignity'])->default("comment");

            $table->unsignedBigInteger('product_review_id')->nullable();

            $table->foreign('product_review_id')->references('id')->on('product_reviews')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_review_descriptions');
    }
};
