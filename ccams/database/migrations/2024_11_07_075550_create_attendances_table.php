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
            $table->unsignedBigInteger('user_id'); // Foreign Key to Students table
            $table->unsignedBigInteger('club_id');    // Foreign Key to Clubs table
            $table->unsignedTinyInteger('week_number'); // Week 1-12
            $table->enum('status', ['Present', 'Absent', 'Excused']); // Attendance status
            $table->timestamps();

            // Set up foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key to users table
            $table->foreign('club_id')->references('club_id')->on('club')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
