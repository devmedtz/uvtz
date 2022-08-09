<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'created_by',
        'category_name',
        'category_description',
    ];
}
