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
        Schema::create('point_links', function (Blueprint $table) {
            $table->id();
            $table->string('url', 124);
            $table->unsignedBigInteger('point_link_category_id');
            $table->unsignedBigInteger('point_id');

            $table->foreign('point_link_category_id')->references('id')->on('point_link_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('point_id')->references('id')->on('points')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('point_links');
    }
};
