<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function viewRegistration()
    {
        $registrations = Registration::with('club')->where('user_id', 1)->get();
        //$registrations = Registration::with('club')->where('user_id', auth()->id())->get();

        return view('dashboard.index', ['registrations' => $registrations]);
    }
}
