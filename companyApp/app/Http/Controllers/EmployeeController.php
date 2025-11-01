<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        //  $employee = Employee :: orderby('id','asc')->pagination(10);
        // $employees = Employee::orderBy('id', 'asc')->paginate(10);

        $employees = Employee::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('department', 'like', "%{$search}%");
        })
            ->orderBy('id', 'asc')
            ->paginate(10);

        //   return view('employee.index',compact('employee'));
        return view('employees.index', compact('employees'));
    }
}
