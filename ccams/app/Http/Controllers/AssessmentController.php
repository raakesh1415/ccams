<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\User;
use App\Models\Registration;
use App\Models\Club;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Fetch all registered clubs for the user
        $registrations = Registration::where('user_id', $userId)->with('club')->get();
        return view("assessment.index", compact('registrations'));
    }

    public function list($club_id)
    {
        $userId = Auth::id();

        // Fetch the specific club registration for the teacher
        $registration = Registration::where('user_id', $userId)
            ->where('club_id', $club_id)
            ->with('club')
            ->first();

        // Fetch assessments for this club
        $assessments = Assessment::where('club_id', $club_id)->with('user', 'club')->get();

        return view("assessment.list", [
            'assessments' => $assessments,
            'club' => $registration->club
        ]);
    }



    public function create($club_id)
    {
        // First verify the club exists
        $club = Club::findOrFail($club_id);

        // Get registered students with error handling
        $registeredUsers = Registration::whereHas('user', function ($query) {
            $query->where('role', 'student');
        })
            ->where('club_id', $club_id)
            ->with('user')
            ->get();

        // Debug to check what data you're getting
        // dd($registeredUsers);  // Uncomment this to check the data

        return view('assessment.create', [
            'users' => $registeredUsers,
            'club' => $club,
            'club_id' => $club_id
        ]);
    }



    public function store(Request $request)
    {
        // Validate incoming request data
        $data = $request->validate([
            'user_id' => 'required|exists:users,id', // Ensure user_id exists in users table
            'position' => 'required',
            'engagement' => 'array|required',
            'achievement' => 'array|required',
            'commitment' => 'array|required',
            'contribution' => 'array|required',
            'attendance' => 'required|numeric',
            'comment' => 'required|string',
            'club_id' => 'required|exists:clubs,club_id',
        ]);

        // Define scores for position
        $positionScores = [
            'President' => 10,
            'Vice President' => 8,
            'Secretary' => 8,
            'Treasurer' => 8,
            'Vice Secretary' => 6,
            'Vice Treasurer' => 6,
            'AJK' => 6,
            'Active Member' => 4,
            'Ordinary Member' => 2,
        ];
        // Get the score for the selected position
        $pos = $positionScores[$data['position']] ?? 0; // Default to 0 if not found


        // Define scores for engagement
        $engagementScores = [
            'I1' => 20,
            'N1' => 17,
            'C1' => 14,
            'D1' => 11,
            'S1' => 0,
            'I2' => 15,
            'N2' => 12,
            'C2' => 10,
            'D2' => 8,
            'S2' => 0,
            'I3' => 10,
            'N3' => 8,
            'C3' => 6,
            'D3' => 4,
            'S3' => 0,
        ];
        // Calculate total engagement score
        $eng = 0;
        foreach ($request->engagement as $engagement) {
            $eng += $engagementScores[$engagement] ?? 0; // Default to 0 if not found
        }
        $eng = min($eng, 20); // Cap at 20 marks


        // Define scores for achievement
        $achievementScores = [
            'IC' => 20,
            'NC' => 17,
            'CC' => 14,
            'DC' => 11,
            'SC' => 8,
            'I1' => 19,
            'N1' => 16,
            'C1' => 13,
            'D1' => 10,
            'S1' => 7,
            'I2' => 18,
            'N2' => 15,
            'C2' => 12,
            'D2' => 9,
            'S2' => 6,
        ];
        // Calculate total achievement score
        $ach = 0;
        foreach ($request->achievement as $achievement) {
            $ach += $achievementScores[$achievement] ?? 0; // Default to 0 if not found
        }
        $ach = min($ach, 20); // Cap at 10 marks


        // Define scores for commitment
        $commitmentScores = [
            'C1' => 3,
            'C2' => 3,
            'C3' => 2,
            'C4' => 2,
            'C5' => 2,
            'C6' => 2,
            'C7' => 2,
            'C8' => 2,
            'C9' => 2,
            'C10' => 2,
            'C11' => 2,
            'C12' => 2,
        ];
        // Calculate total commitment score
        $com = 0;
        foreach ($request->commitment as $commitment) {
            $com += $commitmentScores[$commitment] ?? 0; // Default to 0 if not found
        }
        $com = min($com, 10); // Cap at 10 marks


        // Define scores for contribution
        $contributionScores = [
            'CS1' => 10,
            'CS2' => 10,
            'CS3' => 8,
            'CS4' => 5,
        ];
        // Calculate total contribution score
        $con = 0;
        foreach ($request->contribution as $contribution) {
            $con += $contributionScores[$contribution] ?? 0; // Default to 0 if not found
        }
        $con = min($con, 10); // Cap at 10 marks


        // Calculate attendance score using the formula
        $attend = ($data['attendance'] / 12) * 40; // Attendance formula
        $attend = min($attend, 40);

        // Calculate total marks
        $total = $pos + $eng + $ach + $com + $con + $attend;
        // Cap the total marks at 110
        $data['total_mark'] = min($total, 110); // Max 110 marks

        // Prepare data for database insertion
        $assessmentData = [
            'user_id' => $data['user_id'], // Save user_id
            'position' => $data['position'],
            'engagement' => $data['engagement'],
            'achievement' => $data['achievement'],
            'commitment' => $data['commitment'],
            'contribution' => $data['contribution'],
            'attendance' => $data['attendance'],
            'comment' => $data['comment'],
            'total_mark' => $data['total_mark'],
            'club_id' => $data['club_id'],
        ];

        // Create new assessment record in the database
        Assessment::create($assessmentData);

        // Redirect to the assessment list page
        return redirect()->route('assessment.list', ['club_id' => $data['club_id']])->with('success', 'Assessment saved successfully!');
    }

    // AssessmentController.php
    public function show($assessment_id)
    {
        $assessment = Assessment::findOrFail($assessment_id);
        $user = $assessment->user; // Assuming there's a relationship set up between Assessment and User
        return view("assessment.show", compact('assessment', 'user'));
    }

    public function view($assessment_id)
    {
        $assessment = Assessment::findOrFail($assessment_id);
        $user = $assessment->user; // Assuming there's a relationship set up between Assessment and User
        return view("assessment.view", compact('assessment', 'user'));
    }

    public function edit($assessment_id)
    {
        $assessment = Assessment::findOrFail($assessment_id);
        
        // Get registered students for this specific club
        $registeredUsers = Registration::whereHas('user', function ($query) {
            $query->where('role', 'student');
        })
        ->where('club_id', $assessment->club_id)
        ->with('user')
        ->get();

        return view("assessment.edit", [
            'assessment' => $assessment,
            'users' => $registeredUsers,
            'club' => $assessment->club
        ]);
    }

    public function update(Request $request, $assessment_id)
    {
        $assessment = Assessment::findOrFail($assessment_id);
        // Validate incoming request data
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'position' => 'required',
            'engagement' => 'array|required',
            'achievement' => 'array|required',
            'commitment' => 'array|required',
            'contribution' => 'array|required',
            'attendance' => 'required|numeric',
            'comment' => 'required|string',
            'club_id' => 'required|exists:clubs,club_id',
        ]);

        // Define scores for position
        $positionScores = [
            'President' => 10,
            'Vice President' => 8,
            'Secretary' => 8,
            'Treasurer' => 8,
            'Vice Secretary' => 6,
            'Vice Treasurer' => 6,
            'AJK' => 6,
            'Active Member' => 4,
            'Ordinary Member' => 2,
        ];
        // Get the score for the selected position
        $pos = $positionScores[$data['position']] ?? 0; // Default to 0 if not found


        // Define scores for engagement
        $engagementScores = [
            'I1' => 20,
            'N1' => 17,
            'C1' => 14,
            'D1' => 11,
            'S1' => 0,
            'I2' => 15,
            'N2' => 12,
            'C2' => 10,
            'D2' => 8,
            'S2' => 0,
            'I3' => 10,
            'N3' => 8,
            'C3' => 6,
            'D3' => 4,
            'S3' => 0,
        ];
        // Calculate total engagement score
        $eng = 0;
        foreach ($request->engagement as $engagement) {
            $eng += $engagementScores[$engagement] ?? 0; // Default to 0 if not found
        }
        $eng = min($eng, 20); // Cap at 20 marks


        // Define scores for achievement
        $achievementScores = [
            'IC' => 20,
            'NC' => 17,
            'CC' => 14,
            'DC' => 11,
            'SC' => 8,
            'I1' => 19,
            'N1' => 16,
            'C1' => 13,
            'D1' => 10,
            'S1' => 7,
            'I2' => 18,
            'N2' => 15,
            'C2' => 12,
            'D2' => 9,
            'S2' => 6,
        ];
        // Calculate total achievement score
        $ach = 0;
        foreach ($request->achievement as $achievement) {
            $ach += $achievementScores[$achievement] ?? 0; // Default to 0 if not found
        }
        $ach = min($ach, 20); // Cap at 20 marks


        // Define scores for commitment
        $commitmentScores = [
            'C1' => 3,
            'C2' => 3,
            'C3' => 2,
            'C4' => 2,
            'C5' => 2,
            'C6' => 2,
            'C7' => 2,
            'C8' => 2,
            'C9' => 2,
            'C10' => 2,
            'C11' => 2,
            'C12' => 2,
        ];
        // Calculate total commitment score
        $com = 0;
        foreach ($request->commitment as $commitment) {
            $com += $commitmentScores[$commitment] ?? 0; // Default to 0 if not found
        }
        $com = min($com, 10); // Cap at 10 marks


        // Define scores for contribution
        $contributionScores = [
            'CS1' => 10,
            'CS2' => 10,
            'CS3' => 8,
            'CS4' => 5,
        ];
        // Calculate total contribution score
        $con = 0;
        foreach ($request->contribution as $contribution) {
            $con += $contributionScores[$contribution] ?? 0; // Default to 0 if not found
        }
        $con = min($con, 10); // Cap at 10 marks


        // Calculate attendance score using the formula
        $attend = ($data['attendance'] / 12) * 40; // Attendance formula
        $attend = min($attend, 40); // Cap at 40 marks


        // Calculate total marks
        $total = $pos + $eng + $ach + $com + $con + $attend;
        // Cap the total marks at 110
        $data['total_mark'] = min($total, 110); // Max 110 marks

        // Update the assessment record in the database
        $assessment->update(array_merge($data, ['total_mark' => $data['total_mark']]));

        // Redirect to the assessment list page
        return redirect()->route('assessment.list', ['club_id' => $assessment->club_id])
        ->with('success', 'Assessment updated successfully!');
    }


    public function destroy($assessment_id)
    {
        $assessment = Assessment::findOrFail($assessment_id);
        $club_id = $assessment->club_id; // Store club_id before deletion
        
        $assessment->delete();
        
        return redirect()->route('assessment.list', ['club_id' => $club_id])
            ->with('success', 'Assessment deleted successfully!');
    }
}
