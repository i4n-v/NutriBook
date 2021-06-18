<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            NutritionistSeeder::class,
            PatientSeeder::class,
            EvaluationSeeder::class,
            SkinFoldSeeder::class,
            BodyMeasurementSeeder::class,
            AnamneseSeeder::class,
        ]);
    }
}
