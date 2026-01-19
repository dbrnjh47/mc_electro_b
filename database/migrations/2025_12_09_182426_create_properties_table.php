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
        Schema::create('property_types', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['checkbox', 'select', 'range', 'radio', 'select_list'])->default("checkbox");
            $table->timestamps();
        });

        Schema::create('property_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title', 128);
            $table->timestamps();
        });

        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->string('title', 128)->unique();
            $table->decimal('ordering', 5, 2)->unsigned()->default(100);
            $table->boolean('is_on')->default(1);

            $table->unsignedBigInteger('property_type_id')->nullable();
            $table->unsignedBigInteger('property_section_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->unsignedBigInteger('to_unit_id')->nullable();

            $table->foreign('property_type_id')->references('id')->on('property_types')->onUpdate('cascade'); // ->onDelete('cascade')
            $table->foreign('property_section_id')->references('id')->on('property_sections')->onUpdate('cascade'); // ->onDelete('cascade')
            $table->foreign('unit_id')->references('id')->on('units')->onUpdate('cascade'); // ->onDelete('cascade')
            $table->foreign('to_unit_id')->references('id')->on('units')->onUpdate('cascade'); // ->onDelete('cascade')

            $table->timestamps();
        });

        Schema::create('property_values', function (Blueprint $table) {
            $table->id();

            $table->string('value')->nullable();
            $table->decimal('number', 30, 15)->nullable();
            $table->enum('type', ['text', 'float']);

            $table->unique(['value'], 'property_value_unique');
            $table->unique(['number'], 'property_value_number_unique');

            $table->timestamps();
        });

        Schema::create('property_categories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('property_id')->references('id')->on('properties')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')

            $table->unique(['property_id', 'category_id'], 'property_category_unique');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_categories');
        Schema::dropIfExists('property_values');
        Schema::dropIfExists('properties');
        Schema::dropIfExists('property_sections');
        Schema::dropIfExists('property_types');
    }
};
