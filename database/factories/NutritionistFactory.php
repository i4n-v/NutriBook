<?php

namespace Database\Factories;

use App\Models\Nutritionist;
use Illuminate\Database\Eloquent\Factories\Factory;

class NutritionistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nutritionist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'CRN' => $this->faker->unique()->randomNumber(4, false),
        ];
    }
}
