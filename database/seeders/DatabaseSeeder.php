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
            UserSeeder::class,
            NutritionistSeeder::class,
            PatientSeeder::class,
            EvaluationSeeder::class,
            SkinFoldSeeder::class,
            BodyMeasurementSeeder::class,
            AnamneseSeeder::class,
            FoodSeeder::class,
            MealSeeder::class,
            FoodItemSeeder::class,
            EatingPlanSeeder::class,
            EatingPlanMealSeeder::class
            ]);
    }
}
