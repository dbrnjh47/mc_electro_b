<?php

use App\Http\Migrations\CategoryModelMigration;
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

            $table->string('slug', 64)->unique();
            $table->boolean('is_on')->default(1);
            $table->string('preview')->nullable();

            $table->timestamps();
        });

        (new CategoryModelMigration)->createAll();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        (new CategoryModelMigration)->dropAll();
    }
};
