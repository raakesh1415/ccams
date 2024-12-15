<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Club;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller 
{
    public function showUserSummary()
    {
        // Retrieve registrations for the user
        $registrations = Registration::with('club')->where('user_id', 1)->get();
        
        // Retrieve user details
        $user = User::findOrFail(1); // Replace 1 with the actual user ID or use auth()->id()
        
        // Pass both registrations and user details to the view
        return view('dashboard.index', [
            'registrations' => $registrations,
            'user' => $user
        ]);
    }
}
