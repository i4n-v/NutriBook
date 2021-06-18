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
            'bust' => $this->faker->randomNumber(2, false),
            'thorax' => $this->faker->randomNumber(2, false),
            'waist'=> $this->faker->randomNumber(2, false),
            'hip'=> $this->faker->randomNumber(2, false),
            'thigh'=> $this->faker->randomNumber(2, false),
            'calf'=> $this->faker->randomNumber(2, false),
        ];
    }
}
