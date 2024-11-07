<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Assessment extends Model
{
    use HasFactory; 

    protected $table = 'assessments';
    protected $fillable = [
        'position',
        'engagement',
        'achievement',
        'commitment',
        'contribution',
        'attendance',
        'comment',
        'total_mark', // Add this line
    ];
}
