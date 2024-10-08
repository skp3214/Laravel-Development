<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CookieController extends Controller{
    public function  createCookie(){
        $response=new Response("The cookie has been set");
        $response->cookie('studentname','Aneesh',0.5);
        return $response;
    }
    public function fetchCookie(Request $request){
        return $request->cookie('studentname');
    }

    public function deleteCookie(){
        $response=new Response("The cookie has been deleted");
        $response->cookie('studentname',null,0);
        return $response;
    }
}