<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'  // 'student' or 'teacher'
    ];

    // A user (teacher) can manage many clubs
    public function clubs()
    {
        return $this->hasMany(Club::class, 'teacher_id');
    }

    // A user (student) can belong to many clubs
    public function clubsAsStudent()
    {
        return $this->belongsToMany(Club::class, 'club_student', 'user_id', 'club_id')
                    ->where('role', 'student');
    }

    // An alias to check if the user is a teacher
    public function isTeacher()
    {
        return $this->role === 'teacher';
    }

    // An alias to check if the user is a student
    public function isStudent()
    {
        return $this->role === 'student';
    }
}
