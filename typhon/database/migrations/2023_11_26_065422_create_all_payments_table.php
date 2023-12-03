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
        Schema::create('all_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paymentID');
            $table->integer('student_id');
            $table->integer('amount');
            $table->timestamps();


            $table->foreign('paymentID')->references('id')->on('Payments'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_payments');
    }
};
