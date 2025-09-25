<?php

namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function index()
    {
        return view('student');
    }
   
    public function addStudent(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|digits:10',
        ]);

        // Create new student
        $student = new Student();
        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->phone = $validatedData['phone'];
        $student->save();

        // Flash success message
        $request->session()->flash('success', 'Student added successfully');

        return redirect('addStudent');
    }



    function studentlist()
    {
        $studentdata = student::all();
        return view('addstudent', ['students' => $studentdata]);
    }


    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('editStudent', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();

        return redirect('addStudent');
    }
    public function delete(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect('addStudent');
    }
}
