<?php

namespace Database\Factories;

use App\Models\Anamnese;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnamneseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Anamnese::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()   {
        return [
            'Objective' => $this->faker->word(),
            'pathological_history' => $this->faker->sentence(),
            'Family history' => $this->faker->sentence(),
            'used_drugs' => $this->faker->words(),
            'life_style' => $this->faker->word(),           
        ];
    }
}
