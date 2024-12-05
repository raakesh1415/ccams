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

public function edit($club_id)
{
    // Retrieve club by 'club_id' instead of 'id'
   $club = Club::findOrFail($club_id);
    return view('club.create', compact('club'));
}

public function update(Request $request, $club_id)
{
    // Find the club by club_id
    $club = Club::findOrFail($club_id);

    // Validate the input, including the image
    $request->validate([
        'club_name' => 'required|string|max:255',
        'club_description' => 'required|string',
        'participant_total' => 'required|integer',
        'club_category' => 'required|string',
        'club_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validate the image
    ]);

    // Handle the image upload
    if ($request->hasFile('club_pic')) {
        // Delete the old image if it exists
        if ($club->club_pic) {
            Storage::delete('public/' . $club->club_pic);
        }

        // Store the new image
        $imagePath = $request->file('club_pic')->store('clubs', 'public');

        // Update the image path in the database
        $club->club_pic = $imagePath;
    }

    // Update other fields
    $club->club_name = $request->club_name;
    $club->club_description = $request->club_description;
    $club->participant_total = $request->participant_total;
    $club->club_category = $request->club_category;

    // Save the updated club
    $club->save();

    return redirect()->route('club.edit', ['club_id' => $club->club_id])->with('success', 'Club updated successfully!');
}

public function destroy($id)
{
    // Find the club by 'club_id'
    $club = Club::where('club_id', $id)->firstOrFail();

    // Delete associated image if exists
    if ($club->club_pic) {
        Storage::delete('public/' . $club->club_pic);
    }

    // Delete the club
    $club->delete();

    // Redirect to the clubs list with a success message
    return redirect()->route('club.index')->with('success', 'Club deleted successfully!');
}

    
}
