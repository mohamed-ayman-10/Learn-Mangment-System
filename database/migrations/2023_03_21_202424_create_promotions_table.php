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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('from_grade');
            $table->unsignedBigInteger('from_classroom');
            $table->unsignedBigInteger('from_section');
            $table->unsignedBigInteger('to_grade');
            $table->unsignedBigInteger('to_classroom');
            $table->unsignedBigInteger('to_section');
            $table->integer('old_academic_year');
            $table->integer('new_academic_year');

            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('from_grade')->references('id')->on('grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('from_classroom')->references('id')->on('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('from_section')->references('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('to_grade')->references('id')->on('grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('to_classroom')->references('id')->on('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('to_section')->references('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
