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
        Schema::create('t_classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->unsignedBigInteger('tutor_id');
            $table->unsignedBigInteger('institute_id');
            $table->float('amount', 8, 2);
            $table->timestamps();

            $table->foreign('tutor_id')->references('id')->on('users');
            $table->foreign('institute_id')->references('id')->on('institutes'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_classes');
    }
};
