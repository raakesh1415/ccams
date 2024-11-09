<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User model
use App\Models\Club; // Import the Club model
use App\Models\Attendance; // Import the Attendance model
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Show list of all available clubs for attendance
    public function index()
    {
        // Fetch all clubs (no filtering based on user roles)
        $clubs = Club::all();

        // Pass the clubs to the view
        return view('attendance.index', compact('clubs'));
    }

    // Show attendance for a specific club
    public function show($clubId)
    {
        // Fetch the club by its ID
        $club = Club::findOrFail($clubId);

        // Fetch all students (assuming students are users with 'role' = 'student')
        $students = User::where('role', 'student')->get();

        // Fetch attendance records for the club (for each student and each week)
        $attendance = Attendance::where('club_id', $clubId)->get();

        // Pass the data to the view
        return view('attendance.show', compact('club', 'students', 'attendance'));
    }

}
