<?php

namespace App\Http\Controllers;
use App\Models\Accessor;

use Illuminate\Http\Request;

class AccessorController extends Controller
{
    function accessor(){
        return Accessor::all();
    }
}
