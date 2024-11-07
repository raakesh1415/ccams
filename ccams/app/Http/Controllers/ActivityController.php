<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    // Show the activities list
    public function index()
    {
        // Retrieve all activities from the database
        $activities = Activity::all();

        // Pass activities to the view
        return view('activities.index', compact('activities'));
    }

    // Show the create form
    public function create()
    {
        return view('activities.create');
    }

    // Handle form submission
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'activity_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date_time' => 'required|date',
            'description' => 'required|string',
            'participants' => 'nullable|integer',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
            'duration' => 'required|string',
        ]);

        // Handle file upload if poster is provided
        $posterPath = null;
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        }

        // Create activity record
        Activity::create([
            'activity_name' => $request->input('activity_name'),
            'location' => $request->input('location'),
            'date_time' => $request->input('date_time'),
            'description' => $request->input('description'),
            'participants' => $request->input('participants'),
            'poster' => $posterPath,
            'category' => $request->input('category'),
            'duration' => $request->input('duration'),
        ]);

        // Redirect to activities list with success message
        return redirect()->route('activities.index')->with('success', 'Activity added successfully!');
    }

}
