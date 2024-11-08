<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    public function up(): void
    {
        
        Schema::create('clubs', function (Blueprint $table) {
            $table->id('club_id');
            $table->string('club_name');
            $table->text('club_description');
            $table->integer('participant_total');
            $table->string('club_category');
            $table->string('club_pic')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }

    
};
