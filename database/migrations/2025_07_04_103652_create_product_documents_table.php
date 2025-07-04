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
        Schema::create('product_documents', function (Blueprint $table) {
            $table->id();

            $table->string('title', 128);
            $table->string('name', 128); // /assets/product/document/test.pdf
            $table->unsignedBigInteger('locale_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();

            $table->foreign('locale_id')->references('id')->on('locales')->onUpdate('cascade'); // ->onDelete('cascade')
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_documents');
    }
};
