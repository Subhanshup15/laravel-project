<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\Projects;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all About entries (or use ->first() if you just want one)
         $about = About::all(); 
          $project = Projects::all(); 

        // Pass $about to the view along with title
        return view('Frontend.index', [
            'title' => 'HOME',
            'about' => $about,
            'project' => $project,
        ]);
    }
}
