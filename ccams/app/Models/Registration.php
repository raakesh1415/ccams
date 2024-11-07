<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    //Fillable field
    //Can assign multiple attributes to a model instance at once

    protected $table = 'registrations';
    protected $fillable = [
        'user_id',
        'club_id',
        'club_type',
    ];
}
