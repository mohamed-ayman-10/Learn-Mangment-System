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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('password');
            $table->string('job')->nullable();
            $table->bigInteger('phone');
            $table->bigInteger('national_id');
            $table->bigInteger('passport_id')->nullable();
            $table->bigInteger('nationalitie_id')->unsigned();
            $table->bigInteger('blood_id')->unsigned()->nullable();
            $table->bigInteger('religion_id')->unsigned();
            $table->foreign('nationalitie_id')->references('id')->on('nationalities');
            $table->foreign('blood_id')->references('id')->on('bloods');
            $table->foreign('religion_id')->references('id')->on('religions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
