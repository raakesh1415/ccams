<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// php artisan migrate after this

//Check
return new class extends Migration
{

    public function up(): void
    {
        Schema::create('Registration', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
};
