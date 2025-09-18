<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vendor_id' => fn () => User::where('role', 1)->inRandomOrder()->first()->id,
            'store_name' => fake()->company,
            'store_description' => fake()->sentence,
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
        ];
    }
}
