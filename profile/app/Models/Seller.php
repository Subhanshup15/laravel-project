<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{

    use HasFactory;
    //when table name is not plural of model name//
    protected $table = 'seller';

    function products(){
        return $this->hasOne('App\Models\Product');
    } 
    
}
