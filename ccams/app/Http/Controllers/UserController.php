<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @return View
     */
    public function index(): View
    {
        $users = User::all(); // Get all users
        return view('users.index', compact('users')); // Return a view with all users
    }

    /**
     * Show the form for creating a new user.
     *
     * @return View
     */
    public function create(): View
    {
        return view('login.index'); // Return the create user view
    }

    /**
     * Store a newly created user in the database.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming request
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
        ]);

        // Create the new user
        User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('login.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $user = User::findOrFail($id); // Find the user by ID
        return view('users.show', compact('user')); // Return a view with the user details
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $user = User::findOrFail($id); // Find the user by ID
        return view('users.edit', compact('user')); // Return the edit user view
    }

    /**
     * Update the specified user in the database.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        // Validate the incoming request
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Exclude the current user's email from the unique validation
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string',
        ]);

        $user = User::findOrFail($id); // Find the user by ID

        // Update user attributes
        $user->update([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? Hash::make($validated['password']) : $user->password,
            'role' => $validated['role'],
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified user from the database.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $user = User::findOrFail($id); // Find the user by ID
        $user->delete(); // Delete the user from the database

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
