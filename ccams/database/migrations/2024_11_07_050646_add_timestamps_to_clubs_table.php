<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToClubsTable extends Migration
{
    public function up()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->timestamps(); // This will add `created_at` and `updated_at` columns
        });
    }

    public function down()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->dropTimestamps(); // This will remove the `created_at` and `updated_at` columns if the migration is rolled back
        });
    }

    
};
