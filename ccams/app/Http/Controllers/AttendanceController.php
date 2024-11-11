<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Club;
use App\Models\Attendance;
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

        // Fetch students with their attendance records for the specified club
        $students = User::where('role', 'student')
            ->with(['attendances' => function ($query) use ($clubId) {
                $query->where('club_id', $clubId);
            }])
            ->get();

        // Status symbols mapping
        $statusSymbols = [
            'Present' => '✅',
            'Absent' => '❌',
            'Excused' => '🟡',
            'N/A' => 'N/A'
        ];

        return view('attendance.show', compact('club', 'students', 'statusSymbols'));
    }

    // Store attendance for multiple students
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

            // Loop through weeks (1 to 12) and update attendance
            foreach ($weeks as $week => $status) {
                // Extract the week number from the key (week_1, week_2, etc.)
                preg_match('/week_(\d+)/', $week, $matches);
                $weekNumber = (int) $matches[1];

                // Use updateOrCreate to handle attendance
                Attendance::updateOrCreate(
                    [
                        'user_id' => $studentId,
                        'club_id' => $clubId,
                        'week_number' => $weekNumber,
                    ],
                    ['status' => $status]
                );
            }
        }

        // Redirect with success message
        return redirect()->route('attendance.show', ['club' => $clubId])
            ->with('success', 'Attendance updated successfully!');
    }

    // Update individual student's attendance
    public function update(Request $request, $studentId)
    {
        $data = $request->input('attendance');
        $student = User::findOrFail($studentId); // Use User model here

        foreach ($data as $week => $status) {
            $weekNumber = (int) filter_var($week, FILTER_SANITIZE_NUMBER_INT);
            $attendance = Attendance::where('user_id', $studentId)
                                    ->where('week_number', $weekNumber)
                                    ->first();
            
            if ($attendance) {
                $attendance->status = $status;
                $attendance->save();
            } else {
                Attendance::create([
                    'user_id' => $studentId,
                    'club_id' => $request->club_id,
                    'week_number' => $weekNumber,
                    'status' => $status,
                ]);
            }
        }

        return redirect()->route('attendance.show', ['club' => $request->club_id])
                        ->with('success', 'Attendance updated successfully!');
    }
}
