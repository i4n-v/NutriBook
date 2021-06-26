<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\User;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=6; $i <= 10; $i++) { 
                Patient::factory(1)->create([
                    'user_id'=> User::find($i)->id
                    ]); 
        }
    }
}
