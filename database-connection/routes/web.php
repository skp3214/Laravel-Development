<?php

use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-story',[StoryController::class, 'addStory']);

Route::post('/add-story',[StoryController::class, 'addstorySubmit']);

Route::get('/all-stories',[StoryController::class, 'fetchAllStories']);

Route::get('/view-story/{id}',[StoryController::class, 'viewStory']);

Route::get('/edit-story/{id}',[StoryController::class, 'editStory']);

Route::post('/edit-story/{id}',[StoryController::class, 'updateStory']);

Route::get('/delete-story/{id}',[StoryController::class, 'deleteStory']);