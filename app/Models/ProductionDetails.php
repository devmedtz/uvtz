<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'qty',
        'status',
        'action',
        'created_by',
        'material_note',
        'production_id',
    ];
}
