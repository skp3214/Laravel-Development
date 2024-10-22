<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //

    public function index(){
        return view('fileupload');
    }
    
    public function uploadFile(Request $request){
        $request->validate([
            'file' => 'required|mimes:png,txt,xlx,xls,pdf|max:2048'
        ]);
        $request->file->store('public/uploads');
        return 'File uploaded successfully';
    }
}
