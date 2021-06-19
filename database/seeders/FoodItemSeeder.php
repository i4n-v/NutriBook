<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodItem;
use App\Models\Meal;
use App\Models\Food;

class FoodItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for($i = 1; $i <= 5; $i++){
            for ($j=1; $j <= 3 ; $j++) { 
                FoodItem::factory(1)->create([
                    'meal_id' => Meal::find($i), 
                    'food_id' => Food::find($j), 
                    ]);
            }
        }    
    }
}
