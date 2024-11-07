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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id('attendanceID'); // Primary Key
            $table->foreignId('student_id'); //->constrained('students'); // Foreign Key referencing students table
            $table->foreignId('club_id'); //->constrained('clubs'); // Foreign Key referencing clubs table
            $table->integer('week_number'); // Week number
            $table->enum('status', ['present', 'absent', 'late']); // Attendance status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
