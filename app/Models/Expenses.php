<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'category_id',
        'reference',
        'details',
        'amount',
        'status',
        'created_by',
    ];
}
