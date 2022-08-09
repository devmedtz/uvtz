<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionMaterials extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'created_by',
        'total_unit',
        'material_note',
        'material_name',
        'material_unit',
        'available_unit',
    ];
}
