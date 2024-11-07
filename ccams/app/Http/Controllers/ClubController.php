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
            'clubName' => $validated['club_name'],
            'clubDescription' => $validated['description'],
            'participantTotal' => $validated['participants'],
            'clubCategory' => $validated['category'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Club added successfully!');
    }
}
