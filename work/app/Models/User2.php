<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User2 extends Model
{
    use HasFactory;

    protected $table = 'user2s'; // table name

    protected $fillable = [
        'name',
        'phone',
        'address',
        'address_per',
        'age',
        'qualification',
        'designation',
        'height',
        'profile_image',
        'father_name',
        'mother_name',
        'date_of_birth',
        'google_map_link',
        'sister_name',
    ];
}
