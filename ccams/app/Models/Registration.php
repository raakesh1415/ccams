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
        // Use club_id that registered under user_id to find certain club
        return $this->belongsTo(Club::class, 'club_id', 'club_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class, 'club_id', 'club_id')
            ->where('user_id', $this->user_id);
    }
}
