<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Product;

class SellerControler extends Controller
{
    /// one to one///
     function sellerlist(){
        //  return Seller::all(); with product data//    
        return Seller::find(2)->products;
    }

    /// one to many///
    function sellerlistmany(){
        return Seller::find(3   )->productsmany;
 
    }

    function sellerlistmanytomany(){
        return Seller::find(3)->productsmanytomany;
 
    }
    
    function sellerlistmanytoone(){
        // return Product::all();
        $data = Product::with('seller')->get();
        return $data;
 
    }

}
