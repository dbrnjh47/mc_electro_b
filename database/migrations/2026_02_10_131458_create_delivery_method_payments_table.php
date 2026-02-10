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
        Schema::create('delivery_method_payments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('delivery_method_id');
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('person_id');

            $table->foreign('delivery_method_id')->references('id')->on('delivery_methods')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')
            $table->foreign('person_id')->references('id')->on('persons')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')
            $table->foreign('payment_id')->references('id')->on('payments')->onUpdate('cascade')->onDelete('cascade'); // ->onDelete('cascade')

            $table->unique(['delivery_method_id', 'payment_id', 'person_id'], 'delivery_method_payments_by_del_m_and_payment_and_person_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_method_payments');
    }
};
