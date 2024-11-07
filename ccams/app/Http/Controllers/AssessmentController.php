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
        // dd($request->all()); // Check what data is being received

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
    
        // Calculate values
        $data['achievement'] = array_sum($request->input('achievement'));
        $data['commitment'] = array_sum($request->input('commitment'));
        $data['engagement'] = array_sum($request->input('engagement'));
        $data['contribution'] = array_sum($request->input('contribution'));
        $data['total_mark'] = $data['position'] + $data['engagement'] + $data['achievement'] + $data['commitment'] + $data['contribution'] + $data['attendance'];
    
        // Prepare data for database insertion
        $assessmentData = [
            'position' => $data['position'],
            'engagement' => $data['engagement'],
            'achievement' => $data['achievement'],
            'commitment' => $data['commitment'],
            'contribution' => $data['contribution'],
            'attendance' => $data['attendance'],
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
