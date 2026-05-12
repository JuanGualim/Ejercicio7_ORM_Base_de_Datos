<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Address>
 */
class AddressFactory extends Factory
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
        'street' => fake()->streetAddress(),
        'city' => fake()->city(),
        'state' => fake()->state(),
        'country' => fake()->country(),
        'postal_code' => fake()->postcode(),
    ];
}
}
