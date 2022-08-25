<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'status',
        'pay_date',
        'created_by',
        'salary_month',
        'salary_amount',
    ];
}
