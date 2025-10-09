<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
     public function index(){

       $about = About::all(); 
        return view('Frontend.about', ['title' => 'About Us', 'about' => $about]);
     }
}
