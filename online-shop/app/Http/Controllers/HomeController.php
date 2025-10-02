<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_featured', true)
            ->where('is_active', true)
            ->with('category')
            ->take(8)
            ->get();
        
        $categories = Category::take(6)->get();
        
        return view('home', compact('featuredProducts', 'categories'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->with('category')
            ->paginate(12);
        
        return view('products.search', compact('products', 'query'));
    }
}