<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nutritionist;
use App\Models\User;

class NutritionistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        for ($i=1; $i <= 5; $i++) { 
                Nutritionist::factory(1)->create([
                    'user_id'=> User::find($i)->id
                    ]); 
        }
    }
}
