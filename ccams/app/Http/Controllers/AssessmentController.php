<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\User;
use Illuminate\Routing\Controller;

class AssessmentController extends Controller
{
    public function index()
    {   
        return view("assessment.index");
    }
    public function list()
    {   
        // $assessments = Assessment::all();
        $assessment = Assessment::with('user')->get();
        return view("assessment.list", [
            'assessment' => $assessment]
        );
        
    }

    public function create()
    {
        // dd('ok');
        // return view("assessment.create");
        $users = User::all(); // Fetch all users
        return view('assessment.create', compact('users')); // Pass users to the view
    }


    public function store(Request $request) { 
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
        $ach = min($ach, 10); // Cap at 10 marks

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
        ];
    
        // Create new assessment record in the database
        Assessment::create($assessmentData);
    
        // Redirect to the assessment list page
        return redirect()->route('assessment.list')->with('success', 'Assessment saved successfully!');
    }

    public function show(Assessment $assessment)
    {
        // return view("assessment.show");
    }

    public function edit(Assessment $assessment)
    {
        $users = User::all(); // Fetch all users
        return view("assessment.edit", compact('assessment', 'users')); // Pass assessment and users to the view
    }

    public function update(Request $request, Assessment $assessment)
    {
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
            'N1' => 18,
            'C1' => 16,
            'D1' => 14,
            'S1' => 12,
            'I2' => 15,
            'N2' => 13,
            'C2' => 11,
            'D2' => 9,
            'S2' => 7,
            'I3' => 10,
            'N3' => 8,
            'C3' => 6,
            'D3' => 4,
            'S3' => 2,
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

        // Calculate total marks
        $data['total_mark'] = $pos + $eng + $ach + $con + $com + $attend;

        // Cap the total marks at 110
        $data['total_mark'] = min($data['total_mark'], 110); // Max 110 marks

        // Update the assessment record in the database
        $assessment->update(array_merge($data, [
            'total_mark' => $data['total_mark'],
        ]));

        // Redirect to the assessment list page
        return redirect()->route('assessment.list')->with('success', 'Assessment updated successfully!');
    }

    public function destroy(Assessment $assessment)
    {
        // return view("assessment.delete");
        $assessment->delete();
        return redirect()->route('assessment.list')->with('success', 'Assessment updated successfully!');
    }
}
