<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->colorName(),
            'description' => $this->faker->sentences(3, true),
            'price' => $this->faker->randomNumber(2),
            'in_stock' => $this->faker->randomNumber(4),
            'on_sale' => $this->faker->boolean(),
        ];
    }
}
