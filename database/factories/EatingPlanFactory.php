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
        $dates = [$this->faker->date(), $this->faker->date()];
        sort($dates);
        return [
        'date_start' => $dates[0],
        'date_finish'=> $dates[1],
        'title' => $this->faker->sentence(2),
        ];
    }
}
