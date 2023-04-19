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
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grade_id')->references('id')->on('grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('classroom_id')->references('id')->on('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('section_id')->references('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('created_by');
            $table->string('meeting_id');
            $table->string('topic');
            $table->dateTime('start_at');
            $table->integer('duration')->comment('minutes');
            $table->string('password')->comment('meeting password');
            $table->text('start_url');
            $table->text('join_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectures');
    }
};
