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
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->decimal('debit', 8, 2)->nullable();
            $table->decimal('credit', 8, 2)->nullable();
            $table->string('description')->nullable();
            $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('grade_id')->references('id')->on('grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('classroom_id')->references('id')->on('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('receipt_id')->nullable()->references('id')->on('receipts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('processing_id')->nullable()->references('id')->on('processings')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('payment_id')->nullable()->references('id')->on('payments')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_accounts');
    }
};
