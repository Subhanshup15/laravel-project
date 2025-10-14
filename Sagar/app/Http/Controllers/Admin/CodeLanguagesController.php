<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CodeLanguagesController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'description']);

        // Upload image if available
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('language', 'public');
        }

        Language::create($data);

        return redirect()->route('admin.language.index')->with('success', 'Project added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $language = Language::findOrFail($id);
        return view('admin.language.show', compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $language = Language::findOrFail($id);
        return view('admin.language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $language = Language::findOrFail($id);
        $data = $request->only(['title', 'url', 'description']);

        // Update image if new one is uploaded
        if ($request->hasFile('image')) {
            if ($language->image) {
                Storage::disk('public')->delete($language->image);
            }
            $data['image'] = $request->file('image')->store('language', 'public');
        }

        $language->update($data);

        return redirect()->route('admin.language.index')->with('success', 'language updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $language = Language::findOrFail($id);

        if ($language->image) {
            Storage::disk('public')->delete($language->image);
        }

        $language->delete();

        return redirect()->route('admin.projects.index')->with('success', 'language deleted successfully.');
    }
}
