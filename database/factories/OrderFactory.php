<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'address_id' => \App\Models\Address::factory(),
            'total' => fake()->randomFloat(2, 50, 500),
            'status' => fake()->randomElement(['pending', 'paid', 'shipped'])
        ];
    }
}
