<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User; // or create your own model (Student/User)

class UserController extends Controller
{
    // Show form
    public function adduser()
    {
        return view('from.adduser');
    }

    // Handle form submission
    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|digits:10',
            'course'=> 'nullable|string|max:100',
        ]);

        // ✅ Save to database
        User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'course'=> $request->course,
        ]);

        return redirect()->route('user.add')->with('success', 'User added successfully!');
    }
}
