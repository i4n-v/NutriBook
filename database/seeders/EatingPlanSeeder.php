<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nutritionist;
use App\Models\Patient;
use App\Models\EatingPlan;

class EatingPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $my_eating_plans = [
            ["Ganhar músculos","Emagrecer","Definir corpo"],
            ["Ganhar peso","Perder gordura localizada","Perder 10kg"],
            ["Ganhar 10kg","Dieta","Refeições pouco gordurosas"],
            ["Conseguir massa","Refeições ricas em proteínas","Frutas"],
            ["Sucos","Combater diabete","Refeições ricas em ferro"]
        ];

        for ($i = 1; $i <= 5 ; $i++) {
            $patients = Patient::all()->random(3);
            foreach($patients as $key => $patient) {
                EatingPlan::factory(1)->create([
                    'nutritionist_id' => Nutritionist::find($i),
                    'patient_id' => Patient::find($patient->id),
                    'title' => $my_eating_plans[$i-1][$key]
                ]);
            }
        }
    }
}
