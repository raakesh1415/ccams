<?php

namespace App\Http\Controllers;

use App\Models\Club; // Import the Club model
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClubController extends Controller
{
    /**
     * Store a newly created club in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'club_name' => 'required|string|max:255',
            'club_description' => 'required|string',
            'participant_total' => 'required|integer|min:1',
            'club_category' => 'required|string|in:Kelab / Persatuan,Sukan / Permainan,Unit Beruniform',
            'club_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
        $clubPicPath = null;
        if ($request->hasFile('club_pic')) {
            $clubPicPath = $request->file('club_pic')->store('club_pics', 'public');
        }

        // Create a new club record in the database
        Club::create([
            'club_name' => $validated['club_name'],
            'club_description' => $validated['club_description'],
            'participant_total' => $validated['participant_total'],
            'club_category' => $validated['club_category'],
            'club_pic' => $clubPicPath ?? 'default_image.jpg', // Use default if no image is uploaded
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Club added successfully!');
    }
}
