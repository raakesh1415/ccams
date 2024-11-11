<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'ic',
        // 'year',
        // 'level',
        // 'dob',
        'role', // 'student' or 'teacher'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationships

    /**
     * A user (teacher) can manage many clubs.
     */
    public function clubs()
    {
        return $this->hasMany(Club::class, 'teacher_id');
    }

    /**
     * A user (student) can belong to many clubs.
     */
    public function clubsAsStudent()
    {
        return $this->belongsToMany(Club::class, 'club_student', 'user_id', 'club_id')
                    ->where('role', 'student');
    }

    /**
     * A user can have many attendances.
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'user_id'); // Assuming 'user_id' is the foreign key in the attendances table
    }

    // Helper Methods

    /**
     * Check if the user is a teacher.
     */
    public function isTeacher()
    {
        return $this->role === 'teacher';
    }

    /**
     * Check if the user is a student.
     */
    public function isStudent()
    {
        return $this->role === 'student';
    }
    // User.php
    



}
