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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('specialization_id')->unsigned();
            $table->bigInteger('gender_id')->unsigned();
            $table->date('joining_date');
            $table->string('address');
            $table->foreign('specialization_id')->references('id')->on('specializations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('gender_id')->references('id')->on('genders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
