<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Projects extends Model
{
   use HasFactory;

    // Add fillable fields
   protected $fillable = ['title',
                        'image', 
                        'url', 
                        'description'
                        ];

}
