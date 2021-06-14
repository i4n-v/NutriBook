<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'weight',
        'height',
        'lean_mass',
        'body_fat',
        'nutri_id',
        'patient_id',
    ];
}
