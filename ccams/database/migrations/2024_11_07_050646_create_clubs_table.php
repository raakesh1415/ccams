<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id('club_id');
            $table->string('club_name');
            $table->text('club_description');
            $table->integer('participant_total');
            $table->string('club_category');
            $table->string('club_pic')->nullable();
            $table->unsignedBigInteger('teacher_id'); // Foreign Key to Teachers table
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clubs');
    }
}
