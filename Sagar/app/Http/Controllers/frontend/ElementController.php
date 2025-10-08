<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    public function index()
    {
        return view('Frontend.elements', ['title' => 'Elements ']);
    }
}
