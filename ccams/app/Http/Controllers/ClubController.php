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
         // Fetch clubs in the 'Kelab' category
         $clubs = Club::where('club_category', 'Persatuan')->get(); // Persatuan
         
         return view('club.kelab', compact('clubs')); 
     }

     public function showSukanClubs()
    {
    // Fetch clubs in the 'Sukan' category
    $clubs = Club::where('club_category', 'Sukan')->get();

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

public function showDetails($clubs_id)
{
    // Fetch the club based on `club_id` from the database
    $clubs = Club::where('club_id', $clubs_id)->firstOrFail();
    
    // Return the view with the club data
    return view('club.clubdetails', compact('clubs'));
}
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'club_name' => 'required|string|max:255',
            'club_description' => 'required|string',
            'participant_total' => 'required|integer|min:1',
            'club_category' => 'required|string|in:Kelab,Sukan,Unit Beruniform',
            'club_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Handle the file upload
        $clubsPicPath = null;
        if ($request->hasFile('club_pic')) {
            $clubsPicPath = $request->file('club_pic')->store('club_pics', 'public');
        }
    
        // Create a new club record in the database
        Club::create([
            'club_name' => $validated['club_name'],
            'club_description' => $validated['club_description'],
            'participant_total' => $validated['participant_total'],
            'club_category' => $validated['club_category'],
            'club_pic' => $clubsPicPath ?? 'default_image.jpg', // Use default if no image is uploaded
        ]);
    
        // Flash success message and redirect to index
        session()->flash('success', 'Club successfully added!');
        return redirect(url('/club'));

    }
    // ClubController.php

public function edit($clubs_id)
{
    // Retrieve club by 'club_id' instead of 'id'
   $clubs = Club::findOrFail($clubs_id);
    return view('club.create', compact('clubs'));
}

public function update(Request $request, $clubs_id)
{
    // Find the club by club_id
    $clubs = Club::findOrFail($clubs_id);

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
        if ($clubs->club_pic) {
            Storage::delete('public/' . $clubs->club_pic);
        }

        // Store the new image
        $imagePath = $request->file('club_pic')->store('clubs', 'public');

        // Update the image path in the database
        $clubs->club_pic = $imagePath;
    }

    // Update other fields
    $clubs->club_name = $request->club_name;
    $clubs->club_description = $request->club_description;
    $clubs->participant_total = $request->participant_total;
    $clubs->club_category = $request->club_category;

    // Save the updated club
    $clubs->save();

    return redirect()->route('club.edit', ['club_id' => $clubs->club_id])->with('success', 'Club updated successfully!');
}

public function destroy($id)
{
    // Find the club by 'club_id'
    $clubs = Club::where('club_id', $id)->firstOrFail();

    // Delete associated image if exists
    if ($clubs->club_pic) {
        Storage::delete('public/' . $clubs->club_pic);
    }

    // Delete the club
    $clubs->delete();

    // Redirect to the clubs list with a success message
    return redirect()->route('club.index')->with('success', 'Club deleted successfully!');
}

public function searchPersatuan(Request $request)
{
    try {
        // Retrieve the search query and category from the request
        $search = $request->input('search');
        $category = $request->input('category', 'Persatuan'); // Default to 'Persatuan' if not provided

        // Validate the category input to ensure it's valid
        if (!in_array($category, ['Persatuan', 'Sukan', 'Unit Beruniform'])) {
            return back()->with('error', 'Invalid category specified.');
        }

        // Get clubs based on the search query and category
        $clubs = Club::where('club_category', $category)
            ->when($search, function ($query) use ($search) {
                return $query->where('club_name', 'LIKE', "%{$search}%");
            })
            ->get();

        // Return the appropriate view based on the category
        return view('club.kelab', ['clubs' => $clubs, 'category' => $category]);
    } catch (\Exception $e) {
        return back()->with('error', 'Error during search: ' . $e->getMessage());
    }
}

public function searchSukan(Request $request)
{
    try {
        $search = $request->input('search');

        // Get clubs based on search query
        $clubs = Club::where('club_category', 'Sukan')
            ->when($search, function ($query) use ($search) {
                return $query->where('club_name', 'LIKE', "%{$search}%");
            })
            ->get();

        return view('club.sukan', ['clubs' => $clubs]);
    } catch (\Exception $e) {
        return back()->with('error', 'Error during search: ' . $e->getMessage());
    }
}

public function searchUnitBeruniform(Request $request)
{
    try {
        $search = $request->input('search');

        // Get clubs based on search query
        $clubs = Club::where('club_category', 'Unit Beruniform')
            ->when($search, function ($query) use ($search) {
                return $query->where('club_name', 'LIKE', "%{$search}%");
            })
            ->get();

        return view('club.unitberuniform', ['clubs' => $clubs]);
    } catch (\Exception $e) {
        return back()->with('error', 'Error during search: ' . $e->getMessage());
    }
}


    
}
