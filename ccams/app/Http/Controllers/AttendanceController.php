<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        // For now, fetch all clubs (we'll later filter based on user)
        $clubs = Club::all();

        return view('attendance.index', compact('clubs'));
    }

    public function show($clubId)
{
    $club = Club::findOrFail($clubId);
    return view('attendance.show', compact('club'));
}
}
