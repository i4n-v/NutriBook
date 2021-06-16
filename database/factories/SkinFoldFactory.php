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
            'breastplate' =>$this->faker->randomFloat(2),
            'biceps' => $this->faker->randomFloat(2),
            'triceps' => $this->faker->randomFloat(2),
            'abdominal' => $this->faker->randomFloat(2),
            'subscapular' => $this->faker->randomFloat(2),
            'suprailiaco' => $this->faker->randomFloat(2),
            'middle_axillary' => $this->faker->randomFloat(2),
            'thigh' => $this->faker->randomFloat(2),
            'calf' => $this->faker->randomFloat(2),
            'lumbar' => $this->faker->randomFloat(2),
            'evaluation_id' => $this->faker->randomFloat(2),
        ];
    }
}
