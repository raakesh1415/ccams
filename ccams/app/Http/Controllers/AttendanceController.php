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
        $club = Club::findOrFail($clubId);

        // Fetch only users with the role 'student' and their attendance records for the specified club
        $students = User::where('role', 'student')
                        ->with(['attendances' => function ($query) use ($clubId) {
                            $query->where('club_id', $clubId);
                        }])
                        ->get();

        // Status symbols mapping
        $statusSymbols = [
            'Present' => '✅',
            'Absent' => '❌',
            'Excused' => '🟡'
        ];

        return view('attendance.show', compact('club', 'students', 'statusSymbols'));
    }


    public function store(Request $request, $clubId)
    {
        // Validate the form data
        $request->validate([
            'attendance' => 'required|array',
            'attendance.*.week_*' => 'required|in:Present,Absent,Excused',
        ]);

        // Loop through the attendance data
        foreach ($request->attendance as $studentId => $weeks) {
            // Find the student
            $student = User::findOrFail($studentId);

            // Loop through weeks (1 to 12)
            foreach ($weeks as $week => $status) {
                // Extract the week number from the key (week_1, week_2, etc.)
                preg_match('/week_(\d+)/', $week, $matches);
                $weekNumber = $matches[1];

                // Update or create the attendance record
                Attendance::updateOrCreate(
                    [
                        'user_id' => $studentId, // Reference to the student
                        'club_id' => $clubId,    // Reference to the club
                        'week_number' => $weekNumber, // Week number (1 to 12)
                    ],
                    [
                        'status' => $status, // Status: Present, Absent, or Excused
                    ]
                );
            }
        }

        // Add a success message to the session
    return redirect()->route('attendance.show', ['club' => $clubId])
    ->with('success', 'Attendance updated successfully!');
    }

}
