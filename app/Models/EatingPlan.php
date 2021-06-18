<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EatingPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_start',
        'date_finish',
        'nutricionist_id',
        'patient_id',
   ];
}
