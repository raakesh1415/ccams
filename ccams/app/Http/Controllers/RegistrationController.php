<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function kelabIndex()
    {
        $kelab = Club::where('club_category', 'KelabPersatuan')->get();
        return view('registration.kelab', compact('kelab'));
        // kelab => $kelab (assigne $kelab(value) to kelab (key))
    }

    public function sukanIndex()
    {
        $sukan = Club::where('club_category', 'SukanPermainan')->get();
        return view('registration.sukan', compact('sukan'));
    }

    public function beruniformIndex()
    {
        $beruniform = Club::where('club_category', 'UnitBeruniform')->get();
        return view('registration.beruniform', compact('beruniform'));
    }

    public function register(Request $request, $clubId, $clubType)
    {
        //$userId = Auth::id();
        $userId = 1;

        // Fetch the club to check its capacity
        $club = Club::find($clubId);

        if (!$club) {
            return redirect()->back()->with('error', 'Club not found.');
        }

        // Check if the club is already at capacity
        $currentRegistrations = Registration::where('club_id', $clubId)->count();
        if ($currentRegistrations >= $club->participant_total) {
            return redirect()->back()->with('error', 'Registration failed: Club capacity reached.');
        }

        //Check if user is already registerd for this club type
        $existingRegistration = Registration::where('user_id', $userId)->where('club_type', $clubType)->first();

        if ($existingRegistration) {
            return redirect()->back()->with('error', 'You have already registered for ' . $clubType);
        }

        //Register student to club
        Registration::create([
            'user_id' => $userId,   // Assign $userId (value) to user_id (key)
            'club_id' => $clubId,
            'club_type' => $clubType,
        ]);

        return redirect()->back()->with('success', 'Successfully registered for this club');
    }

    public function viewRegister()
    {
        // Assuming Auth::id() gets the authenticated user's ID
        $userId = 1;

        // Fetch all registered clubs for the user
        $registrations = Registration::where('user_id', $userId)->with('club')->get();

        return view('registration.viewRegister', compact('registrations'));
    }

    public function unregister($registrationId)
    {
        $registration = Registration::find($registrationId);
    
        if ($registration) {
            $registration->delete();
            return redirect()->back()->with('success', 'Successfully unregistered from this club');
        }
    
        return redirect()->back()->with('error', 'Registration not found.');
    }
    
}
