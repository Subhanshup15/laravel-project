<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Projects;

class PortfolioController extends Controller
{
     public function index(){
       $project = Projects::all(); 
        return view('Frontend.portfolio', ['title' => 'Portfolio', 'project' => $project]);
     }
}
