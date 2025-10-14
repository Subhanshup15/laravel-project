<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    use HasFactory;

    // Add fillable fields
    protected $fillable = [
        'name',
        'image',
        'description'
    ];
}
