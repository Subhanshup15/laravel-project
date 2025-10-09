<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'about_myself' => 'required|string',
            'experience' => 'nullable|integer',
            'phone' => 'nullable|string|max:20',
        ]);

        // Create About safely
        About::create($request->only([
            'name',
            'designation',
            'about_myself',
            'experience',
            'phone'
        ]));

        return redirect()->route('admin.abouts.index')->with('success', 'About created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'about_myself' => 'required|string',
            'experience' => 'nullable|integer',
            'phone' => 'nullable|string|max:20',
        ]);

        // Update About safely
        $about->update($request->only([
            'name',
            'designation',
            'about_myself',
            'experience',
            'phone'
        ]));

        return redirect()->route('admin.abouts.index')->with('success', 'About updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about->delete();
        return redirect()->route('admin.abouts.index')->with('success', 'About deleted successfully!');
    }
}
