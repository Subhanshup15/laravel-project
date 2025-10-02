<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');
        
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }
        
        if ($request->has('search')) {
            $query->where('name', 'LIKE', "%{$request->search}%");
        }
        
        $products = $query->paginate($request->per_page ?? 10);
        
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return response()->json($product);
    }

    public function featured()
    {
        $products = Product::where('is_featured', true)
            ->where('is_active', true)
            ->with('category')
            ->get();
        
        return response()->json($products);
    }
}