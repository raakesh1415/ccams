<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    // Modify variable based on Club Models
    public function kelabIndex(){
        $kelab = Club::where('type', 'kelab')->get();
        return view('registration.kelab', compact('kelab'));
    }

    public function sukanIndex() {
        $sukan = Club::where('type', 'sukan')->get();
        return view('registration.sukan', compact('sukan'));
    }

    public function beruniformIndex() {
        $beruniform = Club::where('type', 'unitberunifrom')->get();
        return view('registration.beruniform', compact('bernuniform'));
    }

    public function register(Request $request, $clubId, $clubType){
        $userId = Auth::id();

        //Check if user is already registerd for this club type
        $existingRegistration = Registration::where('user_id', $userId)->where('club_type', $clubType)->where('club_id', $clubId)->first();

        if($existingRegistration){
            return redirect()->back()->with('error', 'You have already registered for'.$clubType );
        }

        //Register student to club if yet register
        Registration::create([
            'user_id' => $userId,
            'club_id' => $clubId,
        ]);

        return redirect()->back()->with('success','You have successfully registered for thi club');
    }
}