<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'eating_plan_id',
        'nutritionist_id',

    ];

    public function foods() {
        return $this->belongsToMany(Food::class, 'food_items', 'meal_id', 'food_id')->using(FoodItem::class)->as('foodItem')->withPivot('id', 'weight');
    }

    public function nutritionists(){
        return $this->belongsTo(Nutritionist::class);
    }

    public function eatingPlan(){
        return $this->belongsTo(EatingPlan::class);
    }

}
