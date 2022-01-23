<?php

namespace Database\Factories;

use App\Models\DraftOrder;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class AmountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->randomNumber(),
            'item_id' => $this->faker->randomElement(Item::all()->pluck('id')),
            'order_id' =>$this->faker->randomElement(Order::all()->pluck('id')),
        ];
    }
}
