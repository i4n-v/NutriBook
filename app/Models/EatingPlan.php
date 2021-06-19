<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EatingPlan extends Pivot
{
    use HasFactory;
    protected $table = 'eating_plans';
    protected $fillable = [
        'date_start',
        'date_finish',
        'nutritionist_id',
        'patient_id',
   ];

   public function nutritionist(){
        return $this->belongsTo(Nutritionist::class);
    }
    
   public function patient(){
        return $this->belongsTo(Patient::class);
    }

   public function meals() {
        return $this->belongsToMany(Meal::class, 'eating_plan_meals', 'eating_plan_id', 'meal_id')->using(EatingPlanMeal::class)->as('eatingPlanMeal')->withPivot('id'); 
    }

}
