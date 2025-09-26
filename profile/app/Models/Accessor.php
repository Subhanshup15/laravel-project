<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Accessor extends Model
{
    use HasFactory;
    protected $table='students';
    function getNameAttribute($val){
        return ucfirst($val);
    }

     function getPhoneAttribute($val){
        return "+91".$val;
    }
    

}
