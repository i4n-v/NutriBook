<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'weight',
        'food',
        'sodium',
        'dietary_fiber',
        'trans_fat',
        'saturated_fat',
        'total_fat',
        'protein',
        'carbohydrate',
        'energetic_value',
    ];

    public function meals() {
        return $this->belongsToMany(Meal::class, 'food_items','food_id' , 'meal_id')->using(FoodItem::class)->as('fooditem')->withPivot('id', 'weight'); 
    }
}
