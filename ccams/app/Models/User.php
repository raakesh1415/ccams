<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'clubs';

    protected $fillable = [
        'username','email','password','role'
    ];
}
