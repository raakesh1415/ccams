<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the clubs categorized as 'Kelab / Persatuan'.
     *
     * @return \Illuminate\View\View
     */

     public function showKelabClubs()
     {
         // Fetch clubs in the 'Kelab / Persatuan' category
         $clubs = Club::where('club_category', 'Kelab / Persatuan')->get();
         
         return view('club.kelab', compact('clubs'));
     }

     public function showSukanClubs()
{
    // Fetch clubs in the 'Sukan / Permainan' category
    $clubs = Club::where('club_category', 'Sukan / Permainan')->get();

    // Pass clubs to the view
    return view('club.sukan', compact('clubs'));
}

public function showUnitBeruniformClubs()
{
    // Fetch clubs in the 'Unit Beruniform' category
    $clubs = Club::where('club_category', 'Unit Beruniform')->get();

    // Pass clubs to the view
    return view('club.unitberuniform', compact('clubs'));
}

    /**
     * Store a newly created club in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    
    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'club_name' => 'required|string|max:255',
            'club_description' => 'required|string',
            'participant_total' => 'required|integer|min:1',
            'club_category' => 'required|string|in:Kelab / Persatuan,Sukan / Permainan,Unit Beruniform',
            'club_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload if an image is provided
        $clubPicPath = null;
        if ($request->hasFile('club_pic')) {
            $clubPicPath = $request->file('club_pic')->store('club_pics', 'public');
        }

        // Create a new club record
        Club::create([
            'club_name' => $validated['club_name'],
            'club_description' => $validated['club_description'],
            'participant_total' => $validated['participant_total'],
            'club_category' => $validated['club_category'],
            'club_pic' => $clubPicPath ?? 'default_image.jpg',
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Club added successfully!');
    }

    /**
     * Show the form for creating a new club.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('club.create');
    }
}
