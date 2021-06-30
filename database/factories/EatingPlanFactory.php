<?php

namespace Database\Factories;

use App\Models\EatingPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

class EatingPlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EatingPlan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'date_start' => $this->faker->date(),
        'date_finish'=> $this->faker->date(),
        'title' => $this->faker->sentence(2),
        ];
    }
}
