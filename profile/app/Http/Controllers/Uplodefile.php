<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Uplodefile extends Controller
{
   
   ///uplode file/////
public function fileUplode(Request $request)
{
    // Validate the file (optional but recommended)
    $request->validate([
        'file' => 'required|file|max:10240', // max 10MB
    ]);

    // Get original file name
    $originalName = $request->file('file')->getClientOriginalName();

    // Store the file in 'storage/app/public/uplode' with original name
    $path = $request->file('file')->storeAs('uplode', $originalName, 'public');

    // Flash success message
    $request->session()->flash('success', 'File uploaded successfully: ' . $originalName);

    // Redirect back
    return redirect()->back();
}


public function showGallery()
{
    // Get all uploaded files from 'public/uplode'
    $files = Storage::files('public/uplode');

    // Remove 'public/' from path for public access
    $images = array_map(function($file) {
        return str_replace('public/', '/storage/', $file);
    }, $files);

    return view('resume', compact('images'));
}
}
