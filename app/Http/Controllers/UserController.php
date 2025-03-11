<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function dashboard()
    {
        // Get authenticated user
        $user = auth()->user();
        
        return view('dashboards.user', compact('user'));
    }

    public function profile()
    {
        return view('user.profile', ['user' => auth()->user()]);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $userId = $user->id;

        $rules = [
            'name' => 'required|string|max:255',
            'email' => "required|email|max:255|unique:users,email,{$userId}",
        ];

        // If password is being updated
        if ($request->filled('password')) {
            $rules['current_password'] = 'required|current_password';
            $rules['password'] = ['required', 'confirmed', Password::defaults()];
        }

        $validated = $request->validate($rules);

        // Remove password confirmation and current_password from validated data
        unset($validated['password_confirmation']);
        unset($validated['current_password']);

        // Hash the password if it exists
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
    }
}
