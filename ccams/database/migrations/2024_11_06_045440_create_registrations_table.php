<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{

    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id('registration_id');
            $table->id('user_id');
            $table->id('club_id');
            $table->string('club_type');

            //Foreign key
            //OnDelete('cascade') ensures if a user is deleted, all associated registration will deleted
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('club_id')->references('club_id')->on('clubs')->onDelete('cascade');

            //Ensures student can register one club for each club type
            $table->unique(['user_id', 'club_type']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
