<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WeatherController;

Route::get('/weather', [WeatherController::class, 'showWeather']);
Route::get('', [WeatherController::class,'index']);

