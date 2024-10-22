<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'name'=>'required|min:6|max:12',
            'email'=>'required|email|max:120',
            'password'=>'required|numeric'
        ],

        $messages=[
            'name.required'=>'Name is required',
            'name.min'=>'Name must be at least 6 characters',
        ]);

        $name=$request->name;
        echo $name.'<br>';

        $email=$request->email;
        echo $email.'<br>';

        $password=$request->password;
        echo $password.'<br>';

    }
}
