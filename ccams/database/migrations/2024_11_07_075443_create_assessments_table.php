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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id("assessment_id");
            $table->integer('position');
            $table->integer('engagement');
            $table->integer('achievement');
            $table->integer('commitment');
            $table->integer('contribution');
            $table->integer('attendance');
            $table->text('comment');
            $table->integer('total_mark');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
