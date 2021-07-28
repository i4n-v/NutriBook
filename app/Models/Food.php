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

    public static function carboFoods(){
        return array_filter(Food::get()->all(), function ($food){
            return ($food->carbohydrate > $food->total_fat && $food->carbohydrate > $food->protein);
        });
    }

    public static function fatFoods(){
        return array_filter(Food::get()->all(), function ($food){
            return ($food->total_fat > $food->carbohydrate && $food->total_fat > $food->protein);
        });
    }

    public static function proteinFoods(){
        return array_filter(Food::get()->all(), function ($food){
            return ($food->protein > $food->carbohydrate && $food->protein > $food->total_fat);
        });
    }
}
