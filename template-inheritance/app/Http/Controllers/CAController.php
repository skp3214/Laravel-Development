<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CAController extends Controller
{
    function base(){
        return view('base');
    }
    function technology(){
        return view('technology');
    }
    function sports(){
        return view('sports');
    }
    function politics(){
        return view('politics');
    }
    function entertainment(){
        return view('entertainment');
    }
    
}
