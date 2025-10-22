<?php

namespace App\Http\Controllers\api;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return response()->json($product);

        // return response()->json([Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name'=>"required|string|max:255",
            'title'=>'required|string|max:255'
            // 'img' => 'required|image|mimes:jpeg,png,jpg|max:2028'

         ]);
          $imgpath = $request->file('img')->store('uplode','public');

          $product = Product::create([
            'name'=>$request->name,
            'title'=>$request->title
            // 'img' =>$imgpath
          ]);
    
        }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return response()->json($product);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json($product);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json(['message'=>'prodect delete ']);
    }
}
