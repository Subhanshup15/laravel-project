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
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'about_myself' => 'required|string',
            'about' => 'required|string',
            'experience' => 'nullable|integer',
            'phone' => 'nullable|string|max:20',
            'pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        $about = new About();
        $about->name = $request->name;
        $about->designation = $request->designation;
        $about->about_myself = $request->about_myself;
        $about->about = $request->about;
        $about->experience = $request->experience;
        $about->phone = $request->phone;

        if ($request->hasFile('pdf')) {
            $fileName = time() . '_' . $request->pdf->getClientOriginalName();
            $filePath = $request->file('pdf')->storeAs('pdfs', $fileName, 'public');
            $about->pdf = $filePath;
        }

        $about->save();

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
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'about_myself' => 'required|string',
            'about' => 'required|string',
            'experience' => 'nullable|integer',
            'phone' => 'nullable|string|max:20',
            'pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        $about->name = $request->name;
        $about->designation = $request->designation;
        $about->about_myself = $request->about_myself;
        $about->about = $request->about;
        $about->experience = $request->experience;
        $about->phone = $request->phone;

        if ($request->hasFile('pdf')) {
            // Delete old PDF
            if ($about->pdf && file_exists(storage_path('app/public/' . $about->pdf))) {
                unlink(storage_path('app/public/' . $about->pdf));
            }
            $fileName = time() . '_' . $request->pdf->getClientOriginalName();
            $filePath = $request->file('pdf')->storeAs('pdfs', $fileName, 'public');
            $about->pdf = $filePath;
        }

        $about->save();

        return redirect()->route('admin.abouts.index')->with('success', 'About updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        if ($about->pdf && file_exists(storage_path('app/public/' . $about->pdf))) {
            unlink(storage_path('app/public/' . $about->pdf));
        }

        $about->delete();

        return redirect()->back()->with('success', 'About deleted successfully!');
    }
}
