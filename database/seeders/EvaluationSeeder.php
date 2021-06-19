<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evaluation;
use App\Models\Nutritionist;
use App\Models\Patient;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++){
            Evaluation::factory(1)->create([
                'nutritionist_id' => Nutritionist::find($i), 
                'patient_id' => Patient::find($i),
            ]);
        }    
    }
}