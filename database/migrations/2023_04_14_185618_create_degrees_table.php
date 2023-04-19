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
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->float('score');
            $table->enum('abuse', [0, 1])->default(0);
            $table->date('date');
            $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('exam_id')->references('id')->on('exams')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('question_id')->references('id')->on('questions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('degrees');
    }
};
