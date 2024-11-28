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

    public function showData(Request $request){
        $students=[
            [
                "name"=>"Sachin Prajapati",
                "Roll No"=>"72",
                "Reg No"=>12114973
            ],
            [
                "name"=>"Divyanshu Singh",
                "Roll No"=>"73",
                "Reg No"=>12114974
            ],
            [
                "name"=>"Angad Prajapati",
                "Roll No"=>"65",
                "Reg No"=>12114884
            ],
            [
                "name"=>"Rahul Kumar",
                "Roll No"=>"74",
                "Reg No"=>12114975
            ],
            [
                "name"=>"Sachin Srivastava",
                "Roll No"=>"42",
                "Reg No"=>12118569
            ]
            ];
        return view('student',compact('students'));
    }
}

