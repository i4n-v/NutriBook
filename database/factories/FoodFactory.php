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
            'weight'=> $this->faker->randomNumber(2, false),
            'food'=> $this->faker->word(),
            'sodium'=> $this->faker->randomNumber(2, false),
            'dietary_fiber'=> $this->faker->randomNumber(2, false),
            'trans_fat'=> $this->faker->randomNumber(2, false),
            'saturated_fat'=> $this->faker->randomNumber(2, false),
            'total_fat'=> $this->faker->randomNumber(2, false),
            'protein'=> $this->faker->randomNumber(2, false),
            'carbohydrate'=> $this->faker->randomNumber(2, false),
            'energetic value'=> $this->faker->randomNumber(2, false),
        ];
    }
}
