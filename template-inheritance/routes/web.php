<?php

use App\Http\Controllers\CAController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CAController::class,'base']);
Route::get('/news/technology', [CAController::class,'technology']);
Route::get('/news/sports', [CAController::class,'sports']);
Route::get('/news/politics', [CAController::class,'politics']);
Route::get('/news/entertainment', [CAController::class,'entertainment']);

