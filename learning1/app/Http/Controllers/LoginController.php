<?php 

namespace App\Http\Controllers;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
}