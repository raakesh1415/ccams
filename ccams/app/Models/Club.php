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

    // Relationship to Activities
    public function activities()
    {
        return $this->hasMany(Activity::class, 'club_id', 'club_id');
    }

    // Relationship to Registrations
    public function registrations()
    {
        return $this->hasMany(Registration::class, 'club_id', 'club_id');
    }

    // // Relationship to Users (students) via Registration
    // public function students()
    // {
    //     return $this->hasMany(Registration::class, 'club_id', 'club_id')->with('user');
    // }

    // Relationship to Assessments
    
    public function assessments()
    {
        return $this->hasMany(Assessment::class, 'club_id', 'club_id');
    }

}

