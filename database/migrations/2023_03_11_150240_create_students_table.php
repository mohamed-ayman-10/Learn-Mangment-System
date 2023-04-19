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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('birth_day');
            $table->string('academic_year');
            $table->bigInteger('grade_id')->unsigned();
            $table->bigInteger('gender_id')->unsigned();
            $table->bigInteger('nationalitie_id')->unsigned();
            $table->bigInteger('blood_id')->unsigned();
            $table->bigInteger('guardian_id')->unsigned();
            $table->bigInteger('classroom_id')->unsigned();
            $table->bigInteger('section_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('gender_id')->references('id')->on('genders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('nationalitie_id')->references('id')->on('nationalities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('blood_id')->references('id')->on('bloods')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('guardian_id')->references('id')->on('guardians')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('classroom_id')->references('id')->on('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('section_id')->references('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
