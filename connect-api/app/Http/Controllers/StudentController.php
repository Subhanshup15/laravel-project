<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\PullRequestUser;



class StudentController extends Controller
{
    function list(Request $req){

        return Student::all();
    }

    public function index()
    {
        $users = PullRequestUser::fetchUsers();

        return view('pullrequests.index', compact('users'));
    }
}