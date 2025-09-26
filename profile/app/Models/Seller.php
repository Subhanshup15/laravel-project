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
        // one to one relationship//
        //use hasOne aslo model name//
        return $this->hasOne('App\Models\Product');
    } 
    
    function productsmany(){
        // one to many relationship//
        //use hasMany aslo model name//
        return $this->hasMany('App\Models\Product');
    }

    function productsmanyTomany(){
        // many to many relationship//
        //use belongsToMany aslo model name//
        return $this->belongsToMany('App\Models\Product');
    }

 
}
