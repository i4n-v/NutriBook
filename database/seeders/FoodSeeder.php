<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = Food::factory(20)->create();

        foreach($foods as $food){
            if($food->isCarbo()){
                $food->type = 'carbo';
                $food->save();
            }else if($food->isProtein()){
                $food->type = 'protein';
                $food->save();
            }else{
                $food->type = 'fat';
                $food->save();
            }
        }
    }
}
