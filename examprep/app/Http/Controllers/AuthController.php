<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Display login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle login logic
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt login
        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent fixation attacks
            $request->session()->regenerate();
            return redirect()->route('profile');
        }

        // Redirect back with error if login fails
        return back()->withErrors([
            'loginError' => 'Invalid email or password.',
        ])->withInput();
    }

    // Display profile page
    public function profile()
    {
        // Auth::user() provides the authenticated user instance
        return view('profile', ['user' => Auth::user()]);
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    // Handle registration logic
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirect to login with success message
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
