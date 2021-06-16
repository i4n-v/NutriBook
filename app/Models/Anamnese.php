<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anamnese extends Model
{    
    use HasFactory;
    
    protected $fillable = [
        'Objective', //Objetivo
        'pathological_history', //histórico patológico 
        'Family history', //histótico familiar
        'used_drugs', //farmacos usados regularmente
        'life_style', //estilo de vida
        'allergies', //alergias
    ];
}
