<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

  
    protected $fillable = [
        'birth_date',
        'user_id',
    ];

    public function nutritionists() {
        return $this->belongsToMany(Nutritionist::class, 'evaluations', 'patient_id', 'nutritionist_id')->using(Evaluation::class)->as('evaluation')->withPivot('id', 'weight', 'height', 'lean_mass', 'body_fat');
    }
    public function nutritionist() {
        return $this->belongsToMany(Nutritionist::class, 'eating_plans', 'patient_id', 'nutritionist_id')->using(EatingPlan::class)->as('eatingplans')->withPivot('id', 'date_start','date_finish','title'); 
    }

}
