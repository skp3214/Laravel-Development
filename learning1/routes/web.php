<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', function (Request $request) {
    $marks = $request->input('marks');
    if ($marks >= 80 && $marks < 100) {
        $grades = "Grades A";
    } else if ($marks >= 60 && $marks < 80) {
        $grades = "Grades B";
    } else if ($marks >= 40 && $marks < 60) {
        $grades = "Grades C";
    } else if ($marks >= 0 && $marks < 40) {
        $grades = "Grades Fail";
    } else {
        $grades = "Bad Input";
    }
    return view('welcome', compact('grades'));
});

Route::get('/add/{num1}/{num2}', function ($num1, $num2) {
    $sum = $num1 + $num2;
    return $sum;
});

Route::view('test/{name}/{profile}', 'test');
Route::view('test', 'test', ["name" => "Sachin", "profile" => "Student"]);
// Route::get('/test/{name}/{profile}',function($name,$profile){
//     return view('test',["name"=>$name,"profile"=>$profile]);
// });
Route::view('list', 'list');

// Route::view('emp/{empname}/{salary}','emp');

// Route::get('emp/{empname}/{salary}',function($empname,$salary){
//     return view('emp')->with("empname",$empname)->with("salary",$salary);
// });
Route::get('emp/{empname}/{salary}', function ($empname, $salary) {
    return view('emp', compact('empname', 'salary'));
});

Route::get('empr', function () {
    return redirect("emp/sachin/12000");
});

Route::redirect('gotolist', 'list');

Route::get('testing/{message}', [TestController::class, 'display']);

Route::get('testingredirect/{message}', function ($message) {
    return redirect()->action([TestController::class, 'display'], ['message' => $message]);
});

Route::get('calculate-discount/{price}/{discount}', [TestController::class, 'discountedPrice']);

Route::get('products', [ProductsController::class, 'productsDisplay']);

Route::get('products/{product}', [TestController::class, 'displayProduct']);

Route::get('requestform', function () {
    return view('requestform');
});


Route::get('savecookie',[CookieController::class,'createCookie']);
Route::get('fetchcookie',[CookieController::class,'fetchCookie']);
Route::get('deletecookie',[CookieController::class,'deleteCookie']);

Route::get('setsession',[SessionController::class,'setSession']);
Route::get('getsession',[SessionController::class,'fetchSession']);
Route::get('destroysession',[SessionController::class,'destroySession']);

Route::get('login',[LoginController::class,'login']);

Route::get('validate',function(){
    return view('validate');
});
Route::post('validate',[ValidationController::class,'index']);

Route::get('upload',[UploadController::class,'index']);

Route::post('upload',[UploadController::class,'uploadFile']);