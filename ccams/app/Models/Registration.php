<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model

{
    public $timestamps = false; // Disable timestamps
    // Set the table name explicitly (optional if following Laravel's convention)
    protected $table = 'registrations';

    // Set the primary key explicitly (optional if following Laravel's convention)
    protected $primaryKey = 'registration_id';
    protected $fillable = [
        'user_id',
        'club_id',
        'club_type',
    ];

    public function club()
    {
    return $this->belongsTo(Club::class, 'club_id');
    }
}
