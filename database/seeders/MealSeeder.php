<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meal;
use App\Models\Nutritionist;


class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 5 ; $i++) { 
            Meal::factory(5)->create([
                'nutritionist_id' => Nutritionist::find($i),    
            ]);
        }
    }
}
