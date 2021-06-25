<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<=5; $i++){
            Patient::factory(1)->create([
                'email' => "pat$i@gmail.com"
            ]); 
        }
    }
}
