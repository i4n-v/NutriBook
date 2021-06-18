<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BodyMeasurement;
use App\Models\Evaluation;

class BodyMeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 5; $i++) {           
            BodyMeasurement::factory(1)->create([
                'evaluation_id' => Evaluation::find($i),
            ]);
        }
    }
}
