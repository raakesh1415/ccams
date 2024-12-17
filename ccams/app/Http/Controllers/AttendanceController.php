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
    public function show(Request $request, $clubId)
    {
        $club = Club::findOrFail($clubId);

        // Set default weeks to 1 and 12 if no filter is applied
        $startWeek = $request->input('start_week', 1);
        $endWeek = $request->input('end_week', 12);

        // Fetch students and their attendances for the selected weeks only
        $students = User::where('role', 'student')
            ->with(['attendances' => function ($query) use ($clubId, $startWeek, $endWeek) {
                $query->where('club_id', $clubId)
                    ->whereBetween('week_number', [$startWeek, $endWeek]);
            }])
            ->get();

        return view('attendance.show', compact('club', 'students', 'startWeek', 'endWeek'));
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
        $validated = $request->validate([
            'club_id' => 'required|exists:clubs,club_id',
            'attendance' => 'required|array',
        ]);

        $clubId = $validated['club_id'];
        $attendanceData = $validated['attendance'];

        foreach ($attendanceData as $weekNumber => $data) {

            $status = $data['status'];
            
                // Skip if no status is selected
                if (is_null($status) || $status === '') {
                    continue;
                }

                // Update or create attendance record for the specified week
                Attendance::updateOrCreate(
                    [
                        'user_id' => $studentId,
                        'club_id' => $clubId,
                        'week_number' => $weekNumber,
                    ],
                    ['status' => $status]
                );
        }

        return redirect()->route('attendance.show', ['clubs' => $clubId])
                ->with('success', 'Attendance updated successfully!');
    }


    public function viewDetails($user_id, $club_id)
    {
        $student = User::with('attendances')->findOrFail($user_id);
        $club = Club::findOrFail($club_id);
        
        $attendances = $student->attendances->where('club_id', $club_id);

        // Calculate totals
        $totalPresent = $attendances->where('status', 'Present')->count();
        $totalAbsent = $attendances->where('status', 'Absent')->count();
        $totalExcused = $attendances->where('status', 'Excused')->count();

        return view('attendance.details', compact('student', 'club', 'attendances', 'totalPresent', 'totalAbsent', 'totalExcused'));
    }
    
}
