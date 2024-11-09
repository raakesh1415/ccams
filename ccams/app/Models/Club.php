<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    // Set the table name explicitly (optional if following Laravel's convention)
    protected $table = 'clubs';
    
    // Set the primary key explicitly (optional if following Laravel's convention)
    protected $primaryKey = 'club_id';

    // Define which attributes are mass assignable
    protected $fillable = [
        'club_name',         // Name of the club
        'club_description',  // Description of the club
        'participant_total', // Total number of participants in the club
        'club_category',     // Category of the club (e.g., 1 = Club/Society, 2 = Uniformed Unit, 3 = Sports/Games)
        'club_pic',          // Picture URL or file path for the club's image
    ];

    // A club belongs to a teacher (User with teacher role)
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    // A club has many students (Users with student role)
    public function students()
    {
        return $this->belongsToMany(User::class, 'club_student', 'club_id', 'user_id')
                    ->where('role', 'student');
    }
}
