<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EatingPlanMeal extends Pivot
{
    use HasFactory;

    protected $table = 'eating_plan_meals';

    protected $fillable = [
        'eating_plan_id',
        'meal_id'
    ];

    public function eatingPlan(){
        return $this->belongsTo(EatingPlan::class);
    }

    public function meal(){
        return $this->belongsTo(Meal::class);
    }

}
