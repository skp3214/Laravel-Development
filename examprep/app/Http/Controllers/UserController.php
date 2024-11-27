<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function handleRegistration(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        // You can process the validated data here, e.g., save to database

        return view('register')->with('success', 'Registration successful!');
    }
}

