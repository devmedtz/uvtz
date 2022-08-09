<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'salary_amount',
        'salary_month',
        'status',
        'created_by',
        'pay_date',
    ];
}
