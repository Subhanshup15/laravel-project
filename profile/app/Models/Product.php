<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

     use HasFactory;
     //when table name is not plural of model name//
     protected $table = 'product';
      function seller(){
        // many to one relationship//
        //use belongsTo aslo model name//
        return $this->belongsTo('App\Models\Seller');   
    
    }
}
