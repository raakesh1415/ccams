<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id'); // Primary Key
            $table->unsignedBigInteger('user_id'); // Foreign Key to Users table
            $table->string('ic_number')->nullable();
            $table->year('year')->nullable();
            $table->string('level')->nullable();
            $table->text('about_me')->nullable();
            $table->string('timezone')->nullable();
            $table->unsignedBigInteger('club_id'); // Foreign Key to Clubs table
            $table->timestamps();

            // Set up foreign keys
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('club_id')->references('club_id')->on('clubs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
