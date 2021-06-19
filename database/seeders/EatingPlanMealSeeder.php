<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EatingPlan;
use App\Models\Meal;

class EatingPlanMealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++){
            for($j = 1; $j <= 3; $j++){
                EatingPlan::find($i)->meals()->attach(Meal::all()->random()->id);
            }
        }
    }
}
