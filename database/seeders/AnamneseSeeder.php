<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evaluation;
use App\Models\Anamnese;

class AnamneseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 5; $i++) {           
            Anamnese::factory(1)->create([
                'evaluation_id' => Evaluation::find($i),
            ]);
        }
    }
}
