<?php

namespace Database\Factories;

use App\Models\Evaluation;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvaluationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evaluation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'weight' => $this->faker->randomFloat(2),
            'height' => $this->faker->randomFloat(2, 1, 2),
            'lean_mass' => $this->faker->randomNumber(3, false),
            'body_fat' => $this->faker->randomNumber(3, false),
        ];
    }
}
