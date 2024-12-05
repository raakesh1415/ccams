<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    // Show the activities list
    public function index()
    {
        $activities = Activity::all();
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
        $request->validate([
            'activity_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date_time' => 'required|date',
            'description' => 'required|string',
            'participants' => 'nullable|integer',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
            'duration' => 'required|string',
            'club_id' => 'nullable|integer',
        ]);

        $posterPath = null;
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        }

        Activity::create([
            'activity_name' => $request->input('activity_name'),
            'location' => $request->input('location'),
            'date_time' => $request->input('date_time'),
            'description' => $request->input('description'),
            'participants' => $request->input('participants'),
            'poster' => $posterPath,
            'category' => $request->input('category'),
            'duration' => $request->input('duration'),
            'club_id' => $request->input('club_id'),
        ]);

        return redirect()->route('activities.index')->with('success', 'Activity added successfully!');
    }

    // Show the edit form with the current activity data
    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    // Handle the form submission and update the activity
    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'activity_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date_time' => 'required|date',
            'description' => 'required|string',
            'participants' => 'nullable|integer',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
            'duration' => 'required|string',
            'club_id' => 'nullable|integer',
        ]);

        $updateData = [
            'activity_name' => $request->input('activity_name'),
            'location' => $request->input('location'),
            'date_time' => $request->input('date_time'),
            'description' => $request->input('description'),
            'participants' => $request->input('participants'),
            'category' => $request->input('category'),
            'duration' => $request->input('duration'),
            'club_id' => $request->input('club_id'),
        ];

        if ($request->hasFile('poster')) {
            if ($activity->poster) {
                Storage::disk('public')->delete($activity->poster);
            }
            $updateData['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $activity->update($updateData);

        return redirect()->route('activities.index')->with('success', 'Activity updated successfully!');
    }

    public function destroy(Activity $activity)
{
    // Delete the activity
    $activity->delete();

    // Redirect with a success message
    return redirect()->route('activities.index')->with('success', 'Activity deleted successfully');
}
}
