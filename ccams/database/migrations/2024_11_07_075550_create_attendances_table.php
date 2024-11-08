<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id('attendance_id'); // Primary Key
            $table->unsignedBigInteger('student_id'); // Foreign Key to Students table
            $table->unsignedBigInteger('club_id');    // Foreign Key to Clubs table
            $table->unsignedTinyInteger('week_number'); // Week 1-12
            $table->enum('status', ['Present', 'Absent', 'Excused']); // Attendance status
            $table->timestamps();

            // Set up foreign keys
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('club_id')->references('club_id')->on('clubs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
