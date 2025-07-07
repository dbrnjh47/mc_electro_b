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
        Schema::create('unit_locals', function (Blueprint $table) {
            $table->id();

            $table->string('text', 64);
            $table->unsignedBigInteger('locale_id');
            $table->unsignedBigInteger('unit_id');

            $table->foreign('locale_id')->references('id')->on('locales')->onUpdate('cascade'); // ->onDelete('cascade')
            $table->foreign('unit_id')->references('id')->on('units')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_locals');
    }
};
