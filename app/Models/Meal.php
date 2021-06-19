<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Meal extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'day',
        'day_period',
        'nutritionist_id',

    ];

    public function foods() {
        return $this->belongsToMany(Food::class, 'food_items', 'meal_id', 'food_id')->using(FoodItem::class)->as('fooditem')->withPivot('id', 'weight'); 
    }

    public function nutritionists(){
        return $this->belongsTo(Nutritionist::class);
    }

    public function eatingPlans(){
        return $this->belongsToMany(EatingPlan::class, 'eating_plan_meals', 'meal_id', 'eating_plan_id')->using(EatingPlanMeal::class)->as('eatingPlanMeal')->withPivot('id'); 
    }

}
