<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'created_by',
        'supplier_city',
        'supplier_name',
        'supplier_phone',
        'supplier_address',
    ];
}
