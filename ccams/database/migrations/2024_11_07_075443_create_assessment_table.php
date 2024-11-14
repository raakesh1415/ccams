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
        Schema::create('assessment', function (Blueprint $table) {
            $table->id("assessment_id");
            $table->string('position');
            $table->string('engagement');
            $table->string('achievement');
            $table->string('commitment');
            $table->string('contribution');
            $table->string('attendance');
            $table->text('comment');
            $table->integer('total_mark');
            $table->unsignedBigInteger('user_id');
            // $table->string('attendance_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('attendance_id')->references('attendance_id')->on('attendances')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment');
    }
};
