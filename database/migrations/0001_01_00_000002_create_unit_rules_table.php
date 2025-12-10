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
        Schema::create('unit_rules', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('to_unit_id');

            $table->decimal('value', 10, 2);
            $table->string('action', 24);

            $table->foreign('unit_id')->references('id')->on('units')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')
            $table->foreign('to_unit_id')->references('id')->on('units')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')

            $table->unique(['unit_id', 'to_unit_id'], 'unit_rule_unique');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_rules');
    }
};
