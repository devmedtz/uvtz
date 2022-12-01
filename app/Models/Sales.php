<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'inv_no',
        'customer_id',
        'customer_name',
        'tax_percentage',
        'discount_percentage',
        'paid_amount',
        'total_amount',
        'due_amount',
        'status',
        'payment_status',
        'payment_method',
        'note',
        'tax_amount',
        'discount_amount',
        'created_by',
        'transport',
        'due_date'
    ];
}
