<?php

namespace Database\Factories;

use App\Models\Supllier;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
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
            'catalog_number' => $this->faker->unique()->randomNumber(),
            'scale' => $this->faker->randomElement(['קג','גרם','יחידות','ליטר','מל']),
            'supllier_id' => $this->faker->randomElement(Supllier::all()->pluck('id')),
            'price' => $this->faker->randomFloat(2,11,100),
            'deposit' => $this->faker->randomFloat(2,1,10)
        ];
    }
}
