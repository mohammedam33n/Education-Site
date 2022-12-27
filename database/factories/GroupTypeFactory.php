<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupType>
 */
class GroupTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'     => fake()->name,
            'price'    => fake()->numberBetween($min = 50, $max = 2500),
            'days_num' => fake()->numberBetween($min = 2, $max = 6),
        ];
    }
}
