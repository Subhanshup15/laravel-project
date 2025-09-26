<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Product;

class SellerControler extends Controller
{
     function sellerlist(){
        return Seller::find(2)->products;
    }
}
