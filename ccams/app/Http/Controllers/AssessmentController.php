<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment;
use Illuminate\Routing\Controller;

class AssessmentController extends Controller
{
    public function index()
    {   
        $assessments = Assessment::all();
        return view("assessment.list", [
            'assessments' => $assessments]
        );
    }

    public function create()
    {
        // dd('ok');
        return view("assessment.create");
    }

    public function store(Request $request) { 
        // Validate incoming request data
        $data = $request->validate([
            'position' => 'required',
            'engagement' => 'array|required',
            'achievement' => 'array|required', // Ensure it's an array
            'commitment' => 'array|required',   // Ensure it's an array
            'contribution' => 'array|required',
            'attendance' => 'required|numeric',
            'comment' => 'required|string',
        ]);
    
        // Calculate values with maximum limits
        $data['engagement'] = min(array_sum($request->input('engagement')), 20); // Max is 20
        $data['achievement'] = min(array_sum($request->input('achievement')), 20); // Max is 20
        $data['commitment'] = min(array_sum($request->input('commitment')), 10); // Max is 10
        $data['contribution'] = min(array_sum($request->input('contribution')), 10); // Max is 10
        $data['attendance'] = $request->input('attendance'); // Raw attendance input
    
        // Calculate attendance score based on the formula provided
        $attendanceScore = min(($data['attendance'] / 12) * 40, 40); // Max attendance score is 40
    
        // Calculate total mark
        $data['total_mark'] = $data['position'] + $data['engagement'] + $data['achievement'] + $data['commitment'] + $data['contribution'] + $attendanceScore;
    
        // Ensure total_mark does not exceed 110
        $data['total_mark'] = min($data['total_mark'], 110);
    
        // Prepare data for database insertion
        $assessmentData = [
            'position' => $data['position'],
            'engagement' => $data['engagement'],
            'achievement' => $data['achievement'],
            'commitment' => $data['commitment'],
            'contribution' => $data['contribution'],
            'attendance' => $attendanceScore,
            'comment' => $data['comment'],
            'total_mark' => $data['total_mark'], // Ensure this matches the column name in your database
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
        return view("assessment.edit");
    }

    public function update(Assessment $assessment)
    {
        // return view("assessment.update");
    }

    public function destroy(Assessment $assessment)
    {
        // return view("assessment.delete");
    }
}
