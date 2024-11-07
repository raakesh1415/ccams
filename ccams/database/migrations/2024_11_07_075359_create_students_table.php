<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('studentID'); // Primary Key
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->string('ic_number')->nullable();
            $table->year('year')->nullable();
            $table->string('level')->nullable();
            $table->text('about_me')->nullable();
            $table->string('timezone')->nullable();
            $table->foreignId('club_id')->nullable(); //->constrained('clubs'); // Foreign Key to Clubs table
            $table->foreignId('activity_id')->nullable(); //->constrained('activities'); // Foreign Key to Activities table
            $table->foreignId('assessment_id')->nullable(); //->constrained('assessments'); // Foreign Key to Assessments table
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
