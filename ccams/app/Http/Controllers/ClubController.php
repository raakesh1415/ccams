<?php

namespace App\Http\Controllers;

use App\Models\Club; // Import the Club model
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;


class ClubController extends Controller
{
    /**
     * Store a newly created club in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    
     public function showKelabClubs()
     {
         // Fetch clubs in the 'Kelab / Persatuan' category
         $club = Club::where('club_category', 'Kelab / Persatuan')->get();
         
         return view('club.kelab', compact('club'));
     }

     public function showSukanClubs()
    {
    // Fetch clubs in the 'Sukan / Permainan' category
    $club = Club::where('club_category', 'Sukan / Permainan')->get();

    // Pass clubs to the view
    return view('club.sukan', compact('club'));
    }

public function showUnitBeruniformClubs()
{
    // Fetch clubs in the 'Unit Beruniform' category
    $club = Club::where('club_category', 'Unit Beruniform')->get();

    // Pass clubs to the view
    return view('club.unitberuniform', compact('club'));
}

public function showDetails($club_id)
{
    // Fetch the club based on `club_id` from the database
    $club = Club::where('club_id', $club_id)->firstOrFail();
    
    // Return the view with the club data
    return view('club.clubdetails', compact('club'));
}
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
    
        // Flash success message and redirect to index
        session()->flash('success', 'Club successfully added!');
        return redirect(url('/club'));

    }
    // ClubController.php

public function edit($id)
{
    // Retrieve club by 'club_id' instead of 'id'
    $club = Club::where('club_id', $id)->firstOrFail();
    return view('club.create', compact('club'));
}

public function update(Request $request, $id)
{
    // Use 'club_id' to find the specific club record
    $club = Club::where('club_id', $id)->firstOrFail();

    // Update the club fields here
    $club->club_name = $request->input('club_name');
    $club->club_category = $request->input('club_category');
    $club->club_description = $request->input('club_description');
    $club->participant_total = $request->input('participant_total');

    if ($request->hasFile('club_pic')) {
        if ($club->club_pic) {
            Storage::delete('public/' . $club->club_pic);
        }
        $imagePath = $request->file('club_pic')->store('images', 'public');
        $club->club_pic = $imagePath;
    }

    $club->save(); // Save the updated club record

    return redirect()->route('club.details', ['id' => $club->club_id])->with('success', 'Club updated successfully!');
}

    
}
