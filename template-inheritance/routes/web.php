<?php

use App\Http\Controllers\CAController;
use Illuminate\Support\Facades\Route;

Route::prefix('newz')->group(function(){
    Route::get('/', [CAController::class,'base'])->name('base');
    Route::get('/news/technology', [CAController::class,'technology'])->name('technology');
    Route::get('/news/sports', [CAController::class,'sports'])->name('sports');
    Route::get('/news/politics', [CAController::class,'politics'])->name('politics');
    Route::get('/news/entertainment', [CAController::class,'entertainment'])->name('entertainment');
});
Route::get('base',function(){
    return redirect()->route('technology');
});

Route::get('signup',function(){
    return "Sign in here right now";
})->middleware('Some');    // configured in bootstrap folder

Route::middleware('Some')->group(function(){
    Route::get('sign',function(){
        return " sign here";
    });
    Route::get('logout',function(){
        return "Log Here";
    });
    Route::get('nomdl',function(){
        return "withoutmiddleware";
    })->withoutMiddleware('Some');
});
