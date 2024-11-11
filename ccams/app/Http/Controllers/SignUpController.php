<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignUpController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'ic' => 'required|string|max:12',
            'role' => 'required|string|in:student,teacher', // Ensure role is either student or teacher
        ]);

        // Create and save the user to the database
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'], // Hash the password
            'ic' => $validatedData['ic'],
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('login.index')->with('success', 'Signin Successfully');
    }

    private function getMonthNumber($month)
    {
        $months = [
            'January' => '01', 'February' => '02', 'March' => '03', 'April' => '04',
            'May' => '05', 'June' => '06', 'July' => '07', 'August' => '08',
            'September' => '09', 'October' => '10', 'November' => '11', 'December' => '12'
        ];
        return $months[$month] ?? '01'; // 默认返回 01
    }
}
