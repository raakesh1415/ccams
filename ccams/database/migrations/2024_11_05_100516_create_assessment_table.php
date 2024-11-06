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
            $table->id('assessmentID');
            $table->integer('position');
            $table->integer('engagement');
            $table->integer('achievement');
            $table->integer('commitment');
            $table->integer('contribution');
            $table->integer('attendance');
            $table->text('comment');
            $table->integer('totalMarks');
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
