<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a list of users.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Show a specific user.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Store a newly created user.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|unique:users,username|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
            'social_links' => 'nullable|json',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'profile_photo_path' => 'nullable|string|max:2048',
        ]);

        $validated['password'] = Hash::make($validated['password']); // Hash password before storing

        $user = User::create($validated);

        return response()->json($user, 201);
    }

    /**
     * Update an existing user.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => ['string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'name' => 'string|max:255',
            'email' => ['email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8',
            'social_links' => 'nullable|json',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'profile_photo_path' => 'nullable|string|max:2048',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return response()->json($user);
    }

    /**
     * Delete a user.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully.'], 200);
    }
}
