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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('year');
            $table->foreignId('teacher_id')->references('id')->on('teachers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('grade_id')->references('id')->on('grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('classroom_id')->references('id')->on('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('section_id')->references('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('subject_id')->references('id')->on('subjects')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
