<?php

namespace App\Http\Controllers;

use App\Models\User2;
use Illuminate\Http\Request;

class HomeContriller extends Controller
{
    // Display all users
    public function show()
    {
        $users = User2::all();
        return view('home', compact('users'));
    }



    // Show Add/Edit User form
    public function adduser(Request $request)
    {
        // Check if any user exists
        $user = User2::first(); // get the first user from the table (or null if table is empty)

        return view('from.adduser', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'phone'         => 'nullable|digits:10',
            'address'       => 'required|string|max:255',
            'address_per'   => 'nullable|string|max:255',
            'age'           => 'required|integer|min:1|max:120',
            'qualification' => 'nullable|string|max:100',
            'designation'   => 'nullable|string|max:100',
            'height'        => 'nullable|string|max:100',
            'date_of_birth' => 'nullable|string|max:100',
            'father_name'   => 'nullable|string|max:255',
            'mother_name'   => 'nullable|string|max:255',
            'brother_name'  => 'nullable|string|max:255',
            'sister_name'   => 'nullable|string|max:255',
            'google_map_link',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ], [
            'profile_image.max' => 'Please upload an image less than 2MB.',
            'profile_image.mimes' => 'Only jpeg, png, jpg, gif images are allowed.',
        ]);

        $data = $request->except('profile_image');

        // Update or create user
        if ($request->id) {
            $user = User2::find($request->id);
            $user->update($data);
        } else {
            $user = User2::create($data);
        }

        // Handle profile image upload
        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
            $image = $request->file('profile_image');

            // Delete old image if exists
            if ($user->profile_image && file_exists(public_path($user->profile_image))) {
                unlink(public_path($user->profile_image));
            }

            // Save new image
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/profile_images'), $imageName);
            $user->profile_image = 'uploads/profile_images/' . $imageName;
            $user->save();
        }

        return redirect()->route('sagar.adduser')->with('success', 'User saved successfully!');
    }
}
