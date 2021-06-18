<?php

namespace Database\Factories;

use App\Models\skinFold;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkinFoldFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = skinFold::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'breastplate' =>$this->faker->randomNumber(2, false),
            'biceps' => $this->faker->randomNumber(2, false),
            'triceps' => $this->faker->randomNumber(2, false),
            'abdominal' => $this->faker->randomNumber(2, false),
            'subscapular' => $this->faker->randomNumber(2, false),
            'suprailiaco' => $this->faker->randomNumber(2, false),
            'middle_axillary' => $this->faker->randomFloat(2, 40, 200),
            'thigh' => $this->faker->randomNumber(2, false),
            'calf' => $this->faker->randomNumber(2, false),
            'lumbar' => $this->faker->randomNumber(2, false),
            'evaluation_id' => $this->faker->randomNumber(2, false), 
        ];
    }
}
