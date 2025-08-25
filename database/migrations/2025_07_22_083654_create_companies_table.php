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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            $table->string('preview', 128)->nullable(); // /assets/companies/logo
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('phone', 60)->nullable();
            $table->string('email')->nullable();
            $table->boolean('is_on')->default(false);

            $table->integer('count_reviews')->default(0);
            $table->decimal('grade_review', 4, 1)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
