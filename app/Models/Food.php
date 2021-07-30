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
        'type',
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
        return Food::where('type', 'carbo')->get();
    }

    public function isCarbo(){
        return ($this->carbohydrate > $this->total_fat && $this->carbohydrate > $this->protein);
    }

    public static function fatFoods(){
        return Food::where('type', 'fat')->get();
    }

    public function isFat(){
        return ($this->total_fat > $this->carbohydrate && $this->total_fat > $this->protein);
    }

    public static function proteinFoods(){
        return Food::where('type', 'protein')->get();
    }

    public function isProtein(){
        return ($this->protein > $this->carbohydrate && $this->protein > $this->total_fat);
    }
}
