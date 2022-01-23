<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupllierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'customer_number' => $this->faker->unique()->randomNumber(),
            'min_order' => $this->faker->numberBetween(0, 500),
            'logo' => 'default_logo.png',
        ];
    }
}
