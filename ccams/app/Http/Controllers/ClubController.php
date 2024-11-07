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
            'description' => 'required|string',
            'participants' => 'required|integer|min:1',
            'category' => 'required|string|in:Kelab / Persatuan,Sukan / Permainan,Unit Beruniform',
        ]);

        // Create a new club record in the database
        Club::create([
            'club_name' => $validated['club_name'],
            'club_description' => $validated['description'],
            'participant_total' => $validated['participants'],
            'club_category' => $validated['category'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Club added successfully!');
    }
}
