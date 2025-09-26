<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    ////USE THE MODEL THAT  MATCH WITH  DATABSE BASE TABLE  WILL BE CURRECT///

    use HasFactory;
    function getNameAttribute($val)
    {
        return ucfirst($val);
    }

    function getPhoneAttribute($val)
    {
        return "+91" . $val;
    }
    ///Mutators //
    function setNameAttribute($val)
    {
        $this->attributes['name'] = ucfirst($val);
    }
    function setPhoneAttribute($val)
    {
        $this->attributes['phone'] = "+91-" . $val;
    }
}
