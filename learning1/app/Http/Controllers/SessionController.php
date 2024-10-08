<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class SessionController extends Controller
{
    public function setSession(Request $request){
        $request->session()->put('username','Manish');
        // $request->session()->put([
        //     'username'=>'Manish',
        //     'password'=>'1234'
        // ]);
        // session(['username'=>'Manish','password'=>'1234']);
        // $request->session()->push('roles','admin');
    }
    public function fetchSession(Request $request){
        // return $request->session()->get('username');
        return session('roles');
    }
    public function destroySession(Request $request){
        // $request->session()->forget('username');
        echo $request->session()->pull('username');
    }
}