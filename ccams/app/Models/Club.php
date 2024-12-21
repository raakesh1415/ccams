<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $table = 'clubs';
    protected $primaryKey = 'club_id';
    

    protected $fillable = [
        'club_name',
        'club_description',
        'participant_total',
        'club_category',
        'club_pic'
    ];

    //AutoAssignClub
    public function registrations()
    {
        return $this->hasMany(Registration::class, 'club_id', 'club_id');
    }

<<<<<<< Updated upstream
    // Relationship to Users (students) via Registration
    public function students()
    {
        return $this->hasMany(Registration::class, 'club_id', 'club_id')->with('user');
    }
=======
    public function assessments()
    {
        return $this->hasMany(Assessment::class, 'club_id', 'club_id');
    }

>>>>>>> Stashed changes
}

