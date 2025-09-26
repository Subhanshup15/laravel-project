<?php

namespace App\Http\Controllers;
use App\Models\Accessor;
use App\Models\Student;
use Illuminate\Http\Request;

class AccessorController extends Controller
{
    function accessor(){
        return Accessor::all();
    }

    function addaccessor(){
        $student=new Student();
        $student->name="sagar";
        $student->email="s.pardeshi300@gmail.com";
        $student->phone="1234567890";
       
        if($student->save()){
            return "data save";

        }
    }
}
