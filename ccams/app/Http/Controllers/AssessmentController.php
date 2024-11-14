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
    
        // Cap the position score at its maximum value
        $data['position'] = min($data['position'], 10); // Max 10 marks

        // Calculate the sum of selected engagement values
        $data['engagement'] = array_sum($data['engagement']);
        $data['engagement'] = min($data['engagement'], 20); // Max 20 marks

        // Calculate the sum of selected achievement values
        $data['achievement'] = array_sum($data['achievement']);
        $data['achievement'] = min($data['achievement'], 20); // Max 20 marks

        // Calculate the sum of selected commitment values
        $data['commitment'] = array_sum($data['commitment']);
        $data['commitment'] = min($data['commitment'], 10); // Max 10 marks

        // Calculate the sum of selected contribution values
        $data['contribution'] = array_sum($data['contribution']);
        $data['contribution'] = min($data['contribution'], 10); // Max 10 marks

        // Calculate attendance score using the formula
        $data['attendance'] = ($data['attendance'] / 12) * 40; // Attendance formula

        // Calculate total marks
        $data['total_mark'] = $data['position'] + $data['engagement'] + $data['achievement'] + $data['commitment'] + $data['contribution'] + $data['attendance'];

        // Cap the total marks at 110
        $data['total_mark'] = min($data['total_mark'], 110); // Max 110 marks

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

        // Cap the position score at its maximum value
        $data['position'] = min($data['position'], 10); // Max 10 marks

        // Calculate the sum of selected engagement values
        $data['engagement'] = array_sum($data['engagement']);
        $data['engagement'] = min($data['engagement'], 20); // Max 20 marks

        // Calculate the sum of selected achievement values
        $data['achievement'] = array_sum($data['achievement']);
        $data['achievement'] = min($data['achievement'], 20); // Max 20 marks

        // Calculate the sum of selected commitment values
        $data['commitment'] = array_sum($data['commitment']);
        $data['commitment'] = min($data['commitment'], 10); // Max 10 marks

        // Calculate the sum of selected contribution values
        $data['contribution'] = array_sum($data['contribution']);
        $data['contribution'] = min($data['contribution'], 10); // Max 10 marks

        // Calculate attendance score using the formula
        $data['attendance'] = ($data['attendance'] / 12) * 40; // Attendance formula

        // Calculate total marks
        $data['total_mark'] = $data['position'] + $data['engagement'] + $data['achievement'] + $data['commitment'] + $data['contribution'] + $data['attendance'];

        // Cap the total marks at 110
        $data['total_mark'] = min($data['total_mark'], 110); // Max 110 marks

        // Update the assessment record in the database
        $assessment->update($data);

        // Redirect to the assessment list page
        return redirect()->route('assessment.list')->with('success', 'Assessment updated successfully!');
    }

    public function destroy(Assessment $assessment)
    {
        // return view("assessment.delete");
    }
}
