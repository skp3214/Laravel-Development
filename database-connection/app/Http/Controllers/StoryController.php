<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StoryController extends Controller
{
    public function addStory(Request $request){
        return view('add-story');
    }

    public function addstorySubmit(Request $request){

        $title = $request->input('title');
        $content = $request->input('body');
        DB::table('stories')->insert([
            'title' => $title,
            'body' => $content,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/all-stories');
    }

    public function fetchAllStories(){
        $stories = DB::table('stories')->get();
        return view('all-stories', ['stories' => $stories]);
    }

    public function viewStory($id){
        $story = DB::table('stories')->where('id', $id)->first();
        return view('single-story', ['story' => $story]);
    }

    public function editStory($id){
        $story = DB::table('stories')->where('id', $id)->first();
        return view('edit-single-story', ['story' => $story]);
    }

    public function updateStory(Request $request, $id){
        $title = $request->input('title');
        $content = $request->input('body');
        DB::table('stories')->where('id', $id)->update([
            'title' => $title,
            'body' => $content
        ]);
        return redirect('/all-stories');
    }

    public function deleteStory($id){
        DB::table('stories')->where('id', $id)->delete();
        return redirect('/all-stories');
    }
}
