<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'created_by',
        'customer_name',
        'customer_phone',
        'customer_city',
        'customer_address',
    ];
}
