<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutritionist extends Model
{
    use HasFactory;
    protected $fillable = [
        'CRN',  
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function patients() {
        return $this->belongsToMany(Patient::class, 'evaluations', 'nutritionist_id', 'patient_id')->using(Evaluation::class)->as('evaluation')->withPivot('id', 'weight', 'height'); 
    }
    public function meals(){
        return $this->hasMany(Meal::class,'nutritionist_id');
    }
    public function patient() {
        return $this->belongsToMany(Patient::class, 'eating_plans','nutritionist_id' , 'patient_id')->using(EatingPlan::class)->as('eatingplans')->withPivot('id', 'date_start','date_finish','title');
    }

    public function eatingPlans() {
        return $this->hasMany(EatingPlan::class);
    }

}
