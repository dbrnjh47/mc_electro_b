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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
            // $table->unsignedBigInteger('user_id')->nullable()->unique(); // юр лицо
            $table->unsignedBigInteger('user_id')->nullable()->unique();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->unsignedBigInteger('delivery_method_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')
            $table->foreign('payment_id')->references('id')->on('payments')->onUpdate('cascade'); // ->onDelete('cascade')
            $table->foreign('delivery_method_id')->references('id')->on('delivery_methods')->onUpdate('cascade'); // ->onDelete('cascade')

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
