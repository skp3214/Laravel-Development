<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function handleFileUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf,doc,docx|max:2048', // Adjust validation rules as needed
        ]);

        if ($request->file('file')->isValid()) {
            $path = $request->file('file')->store('uploads', 'public'); // Save in 'storage/app/public/uploads'

            return back()->with('success', 'File uploaded successfully!')->with('file_path', $path);
        }

        return back()->withErrors(['file' => 'File upload failed.']);
    }
}

