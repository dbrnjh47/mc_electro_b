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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('official');

            $table->string('cca2', 2)->unique()->index();
            $table->integer('code')->index()->nullable();
            $table->boolean('is_on')->default(false);
            $table->decimal('lon', 12, 7)->nullable();
            $table->decimal('lat', 12, 7)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
