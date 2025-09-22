<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function index(){
        return view('student');
    }
    function add(){
        // return view('addstudent');
        return "add student";
    }
    function delete(){
        // return view('deletestudent');
         return "delete student";
    }
}
