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
            'phone' => 'required|digits:10|unique:students,phone',
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

         ///all data show///
        // $studentdata = student::all();
        //pagination use//
        $studentdata = student::paginate(5);
        return view('studntlist', ['students' => $studentdata]);
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

        return redirect('studentlist');
    }

    public function search(Request $request)
    {
        $query = Student::query();

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%");
        }

        $students = $query->get();

        return view('studntlist', compact('students'));
    }

    public function bulkDelete(Request $request)
{
    $ids = $request->ids;

    if (!$ids) {
        return redirect()->route('students.index')->with('error', 'No students selected');
    }

    Student::whereIn('id', $ids)->delete();

    return redirect()->route('students.index')->with('success', 'Selected students deleted successfully');
}

}
