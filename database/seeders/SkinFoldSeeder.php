<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\skinFold;
use App\Models\Evaluation;

class SkinFoldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) {           
            skinFold::factory(1)->create([
                'evaluation_id' => Evaluation::find($i),
            ]);
        }
    }
}
