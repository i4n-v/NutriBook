<?php

namespace Database\Factories;

use App\Models\BodyMeasurement;
use Illuminate\Database\Eloquent\Factories\Factory;

class BodyMeasurementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BodyMeasurement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bust' => $this->faker->randomFloat(1, 70, 100),
            'thorax' => $this->faker->randomFloat(1, 70, 85),
            'waist'=> $this->faker->randomFloat(1, 60, 80),
            'hip'=> $this->faker->randomFloat(1, 85, 100),
            'thigh'=> $this->faker->randomFloat(1, 50, 70),
            'calf'=> $this->faker->randomFloat(1, 30, 50),
        ];
    }
}
