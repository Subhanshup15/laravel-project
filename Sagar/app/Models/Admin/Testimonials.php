<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonials extends Model
{
   use HasFactory;

    // Add fillable fields
    protected $fillable = [
        'name',
        'designation',
        'about_myself',
        'about',
        'experience',
        'phone',
        "pdf",
    ];
}
