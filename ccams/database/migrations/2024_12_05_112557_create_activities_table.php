<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id("activity_id");
            $table->unsignedBigInteger('club_id');
            $table->unsignedBigInteger('registration_id')->nullable();
            $table->string('activity_name');
            $table->string('location');
            $table->dateTime('date_time');
            $table->text('description');
            $table->integer('participants')->nullable();
            $table->string('poster')->nullable();
            $table->string('category');
            $table->string('duration');
            $table->timestamps();
            
            //Foreign key constraint
            $table->foreign('club_id')->references('club_id')->on('clubs')->onDelete('cascade');
            $table->foreign('registration_id')->references('registration_id')->on('registrations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
}
