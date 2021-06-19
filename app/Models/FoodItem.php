<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


class FoodItem extends Pivot
{
    use HasFactory;
    protected $table ='food_items';
    protected $fillable = [
        'weight',
        'meal_id',
        'food_id',

    ];
    public function food(){
        return $this->belongsTo(Food::class);
    }
    public function meal(){
        return $this->belongsTo(Meal::class);
    }
}
