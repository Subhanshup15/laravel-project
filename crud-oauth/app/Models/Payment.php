<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','amount','currency','status','gateway','transaction_id','meta'
    ];

    protected $casts = [
        'meta' => 'array',
        'amount' => 'decimal:2',
    ];
}