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
        $my_foods = [
            "banana",
            "batata",
            "frango",
            "maçã",
            "queijo",
            "ovo",
            "arroz",
            "macarrão",
            "pão",
            "tomate",
            "cebola",
            "cenoura",
            "cuscuz",
            "tapioca",
            "goiaba",
            "repolho",
            "feijão",
            "chuchu",
            "pepino",
            "castanha"
        ];

        foreach ($my_foods as $food){
            Food::factory(1)->create([
                'food' => $food
            ]);           
        }
    
        foreach(Food::all() as $food){
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
