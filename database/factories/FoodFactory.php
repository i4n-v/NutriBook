<?php

namespace Database\Factories;

use App\Models\Food;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Food::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'weight'=> $this->faker->randomFloat(2),
            'food'=> $this->faker->word(),
            'sodium'=> $this->faker->randomFloat(2),
            'dietary_fiber'=> $this->faker->randomFloat(2),
            'trans_fat'=> $this->faker->randomFloat(2),
            'saturated_fat'=> $this->faker->randomFloat(2),
            'total_fat'=> $this->faker->randomFloat(2),
            'protein'=> $this->faker->randomFloat(2),
            'carbohydrate'=> $this->faker->randomFloat(2),
            'energetic value'=> $this->faker->randomFloat(2),
        ];
    }
}
